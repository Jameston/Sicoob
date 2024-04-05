<template>
  <b-row class="form-login">
    <b-col md="4">
      <div class="logo">
        <img src="/assets/images/logo.png" class="logo-footer">
      </div>
      <b-form class="form" @submit.stop.prevent="onSubmit">
        <b-form-group id="input-login-user" label="" label-for="input-email">
          <label>E-mail</label>
          <b-form-input
            id="input-email"
            name="input-email"
            v-model="form.email"
          ></b-form-input>
        </b-form-group>
        <b-form-group
          id="input-login-password"
          label=""
          label-for="input-senha"
        >
          <label>Senha</label>
          <b-form-input
            type="password"
            id="input-senha"
            name="input-senha"
            v-model="$v.form.password.$model"
            :state="validateState('password')"
          ></b-form-input>
          <b-form-invalid-feedback id="input-2-live-feedback">
            Campo senha é obrigatório.
          </b-form-invalid-feedback>
        </b-form-group>
        <button ref="button_login" class="btn btn-primary">Continuar</button>
      </b-form>
    </b-col>
  </b-row>
</template>

<script>
import { LOGIN } from "@/core/services/store/auth.module";
import { mask } from "vue-the-mask";
import { validationMixin } from "vuelidate";
import { minLength, required } from "vuelidate/lib/validators";

export default {
  mixins: [validationMixin],
  name: "ModuloLogin",
  directives: {
    mask,
  },
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
    };
  },
  validations: {
    form: {
      password: {
        required,
        minLength: minLength(3),
      },
    },
  },
  methods: {
    validateState(name) {
      const { $dirty, $error } = this.$v.form[name];
      return $dirty ? !$error : null;
    },
    resetForm() {
      this.form = {
        email: null,
        cnpj: null,
        password: null,
      };

      this.$nextTick(() => {
        this.$v.$reset();
      });
    },
    async onSubmit() {
      const submitButton = this.$refs["button_login"];

      try {
        this.$v.form.$touch();

        if (this.$v.form.$anyError) {
          return;
        }

        const formData = {};

        formData.email = this.form.email;

        formData.password = this.$v.form.password.$model;

        submitButton.classList.add("spinner", "spinner-light", "spinner-right");

        await this.$store.dispatch(LOGIN, formData);

        this.$router.push("/");
      } catch (error) {
        submitButton.classList.remove(
          "spinner",
          "spinner-light",
          "spinner-right"
        );
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.form-login {
  margin-top: 15rem;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column; /* Adicionando esta linha */
}

.form-login .form-control {
  margin-bottom: 1rem !important;
}

.logo {
  text-align: center;
}

.logo-footer {
  width: 20%;
  margin-bottom: 1rem;
}
</style>
