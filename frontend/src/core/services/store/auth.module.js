import TokenService from "@/core/services/token.service";
import { http } from "@/core/services/api.service";

export const VERIFY_AUTH = "verifyAuth";
export const LOGIN = "login";
export const LOGOUT = "logout";
export const REGISTER = "register";

export const PURGE_AUTH = "logOut";
export const SET_AUTH = "setUser";
export const SET_ERROR = "setError";

const state = {
  errors: null,
  user: {},
  isAuthenticated: !!TokenService.getToken()
};

const getters = {
  currentUser(state) {
    return state.user;
  },
  isAuthenticated(state) {
    return state.isAuthenticated;
  }
};

const actions = {
  [LOGIN](context, credentials) {
    return new Promise((resolve, reject) => {
      http
        .post("/autenticacao", credentials)
        .then(({ data }) => {
          context.commit(SET_AUTH, data);
          resolve(data);
        })
        .catch(({ response }) => {
          reject(response);
        });
    });
  },
  [LOGOUT](context) {
    return new Promise((resolve, reject) => {
      http
        .post("/autenticacao/logout")
        .then(async ({ data }) => {
          context.commit(PURGE_AUTH);
          resolve(data);
        })
        .catch(({ response }) => {
          reject(response);
        });
    });
  },
  [REGISTER](context, credentials) {
    return new Promise((resolve, reject) => {
      http
        .post("/usuario/createpessoa", credentials)
        .then(async ({ data }) => {
          await context.dispatch(LOGIN, {
            email: credentials.usuario,
            password: credentials.password
          });
          resolve(data);
        })
        .catch(({ response }) => {
          reject(response);
        });
    });
  },
  [VERIFY_AUTH](context) {
    if (TokenService.getToken()) {
      return new Promise((resolve, reject) => {
        http
          .get("/autenticacao/dados")
          .then(({ data }) => {
            context.commit(SET_AUTH, data);
            resolve(data);
          })
          .catch(({ response }) => {
            context.commit(SET_ERROR, response.data.errors);
            reject(response);
          });
      });
    }
  }
};

const mutations = {
  [SET_ERROR](state, error) {
    state.errors = error;
  },
  [SET_AUTH](state, user) {
    state.isAuthenticated = true;
    state.errors = {};
    state.user = user;
    if (user.token) {
      TokenService.saveToken(state.user.token);
    }
  },
  [PURGE_AUTH](state) {
    state.isAuthenticated = false;
    state.user = {};
    state.errors = {};
    TokenService.destroyToken();
  }
};

export default {
  state,
  actions,
  mutations,
  getters
};
