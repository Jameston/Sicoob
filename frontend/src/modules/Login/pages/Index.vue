<template>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Informe suas credencias de acesso</p>
      <b-form class="form" @submit.stop.prevent="onSubmit">
        <div class="input-group mb-3">
          <b-form-input
            id="input-email"
            name="input-email"
            v-model="$v.form.email.$model"
            :state="validateState('email')"
          ></b-form-input>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <b-form-input
            type="password"
            id="input-senha"
            name="input-senha"
            v-model="$v.form.password.$model"
            :state="validateState('password')"
          ></b-form-input>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <div class="col-4">
            <button
              type="submit"
              class="btn btn-primary btn-block"
              ref="button_login"
            >
              Acessar
            </button>
          </div>
        </div>
      </b-form>
    </div>
  </div>
</template>

<script>
import { LOGIN } from "@/core/services/store/auth.module";
import { mask } from "vue-the-mask";
import { validationMixin } from "vuelidate";
import { minLength, required, email } from "vuelidate/lib/validators";

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
      email: {
        required,
        email,
      },
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
        console.log(error);
        submitButton.classList.remove(
          "spinner",
          "spinner-light",
          "spinner-right"
        );
      }
    },
  },
  mounted() {
    this.$root.isLoading = true;
    setTimeout(() => {
      this.$root.isLoading = false;
    }, 1000);
  },
};
</script>
