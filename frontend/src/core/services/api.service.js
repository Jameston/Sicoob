import Vue from "vue";
import axios from "axios";
import VueToast from "vue-toast-notification";
import TokenService from "@/core/services/token.service";
// import { SYSTEM_VARIABLE } from "@/modules/Application";

Vue.use(VueToast, {
    position: "top-right",
    duration: 8000,
});

export const http = axios.create({
    // baseURL: `${SYSTEM_VARIABLE.BASE_URL_API}/api`,
    baseURL: `http://127.0.0.1:8000/`,
    headers: {
        Accept: "application/json",
    },
});

http.interceptors.request.use(async(config) => ({
    ...config,
    headers: {
        ...config.headers,
        AuthorizationType: `Bearer`,
        Authorization: `Bearer ` + (await TokenService.getToken()),
    },
}));

http.interceptors.response.use(
    (response) => {
        return response;
    },
    (error) => {
        if (!error.response) {
            return Promise.reject(error);
        }
        
        if (error.response.status == 401) {
            Vue.$toast.error(`É necessário estar logado!`);
            window.location.href = `/#/login`;
        }

        if (error.response.data.msg) {
            Vue.$toast.error(error.response.data.msg);
        }

        if (error.response.data.errors) {
            const errors = Object.entries(error.response.data.errors);

            errors.forEach((element) => {
                element[1].forEach((e) => {
                    Vue.$toast.error(e);
                });
            });
        }
        return Promise.reject(error);
    }
);