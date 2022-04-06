<template>
   <div class="container">
      <h1 class="mt-5 mb-3">Contact us!</h1>
      <p>
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore amet,
         sed magni deleniti nesciunt eos fugit, quo esse exercitationem maiores
         incidunt quia eaque repudiandae ratione dolorem eveniet ex, minima
         corporis?
      </p>
      <Loader v-if="isLoading" />
      <Alert
         v-if="alert.message || hasErrors"
         :type="hasErrors ? 'danger' : 'success'"
      >
         <p v-if="alert.message" class="m-0">{{ alert.message }}</p>
         <ul v-if="hasErrors" class="m-0">
            <li v-for="(value, key) in errors" :key="key">
               {{ value }}
            </li>
         </ul>
      </Alert>
      <div class="row">
         <div class="col-12">
            <div class="form-group">
               <label for="email">Email address</label>
               <input
                  type="email"
                  class="form-control"
                  :class="{ 'is-invalid': errors.email }"
                  id="email"
                  aria-describedby="emailHelp"
                  v-model="form.email"
               />
               <div v-if="errors.email" class="invalid-feedback">
                  {{ errors.email }}
               </div>
               <small v-else id="emailHelp" class="form-text text-muted"
                  >We'll never share your email with anyone else, just with our
                  coworkers!</small
               >
            </div>
         </div>
         <div class="col-12">
            <div class="form-group">
               <label for="message">Tell us!</label>
               <textarea
                  class="form-control"
                  :class="{ 'is-invalid': errors.message }"
                  id="message"
                  rows="9"
                  v-model="form.message"
               ></textarea>
               <div v-if="errors.message" class="invalid-feedback">
                  {{ errors.message }}
               </div>
               <small v-else id="messageHelp" class="form-text text-muted"
                  >U can tell us, don't be shy.</small
               >
            </div>
         </div>
         <div class="col-12">
            <button class="btn btn-primary" @click="sendForm">Send</button>
         </div>
      </div>
   </div>
</template>

<script>
import Loader from "../Loader.vue";
import Alert from "../Alert.vue";
import { isEmpty } from "lodash";

export default {
   name: "Contacts",
   components: {
      Loader,
      Alert,
   },
   data() {
      return {
         form: {
            email: "",
            message: "",
         },
         alert: {
            message: "",
         },
         errors: {},
         isLoading: false,
      };
   },
   methods: {
      validateForm() {
         // Reset alerts
         this.alert.message = "";
         const errors = {};

         // VALIDATION
         if (!this.form.email.trim()) errors.email = "Mail is required";
         if (!this.form.message.trim()) errors.message = "Message is required";
         /* if (
            this.form.email.trim() &&
            this.form.email.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/)
         )
            errors.email = "The mail is invalid"; */

         this.errors = errors;
      },

      sendForm() {
         this.validateForm();

         const params = {
            email: this.form.email,
            message: this.form.message,
         };
         if (!this.hasErrors) {
            // Loading
            this.isLoading = true;
            axios
               .post("http://localhost:8000/api/messages", params)
               .then((res) => {
                  this.form.email = "";
                  this.form.message = "";

                  this.alert.message = "Message sent!";
               })
               .catch((err) => {
                  console.log(err.response.status);
                  this.errors = {
                     message: "An error has occurred",
                  };
               })
               .then(() => {
                  this.isLoading = false;
               });
         }
      },
   },
   computed: {
      hasErrors() {
         return !isEmpty(this.errors);
      },
   },
};
</script>

<style>
</style>