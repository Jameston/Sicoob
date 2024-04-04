export const APPEND_BREADCRUM = "appendBreadcrumb";
export const SET_BREADCRUMB = "setBreadcrumb";
export const ADD_BREADCRUMB = "addBreadcrumb";

export default {
  state: {
    breadcrumbs: []
  },
  getters: {
    breadcrumbs(state) {
      return state.breadcrumbs;
    },
    pageTitle(state) {
      let last = state.breadcrumbs[state.breadcrumbs.length - 1];
      if (last && last.title) {
        return last.title;
      }
    },
    pageAction(state) {
      let last = state.breadcrumbs[state.breadcrumbs.length - 1];
      if (last && last.action) {
        return last.action;
      }
    }
  },
  actions: {
    [SET_BREADCRUMB](state, payload) {
      state.commit(SET_BREADCRUMB, payload);
    },
    [ADD_BREADCRUMB](state, payload) {
      if (typeof payload === "object") {
        payload.forEach(item => state.commit(APPEND_BREADCRUM, item));
      } else {
        state.commit(APPEND_BREADCRUM, payload);
      }
    }
  },
  mutations: {
    [APPEND_BREADCRUM](state, payload) {
      state.breadcrumbs = [...state.breadcrumbs, payload];
    },
    [SET_BREADCRUMB](state, payload) {
      state.breadcrumbs = payload;
    }
  }
};
