<template>
   <div class="container">
      <h1 class="mt-5 mb-3">Contact us!</h1>
      <p>
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore amet,
         sed magni deleniti nesciunt eos fugit, quo esse exercitationem maiores
         incidunt quia eaque repudiandae ratione dolorem eveniet ex, minima
         corporis?
      </p>
      <Alert v-if="alert.message" :type="alert.type">
         <p class="m-0">{{ alert.message }}</p>
      </Alert>
      <div class="row">
         <div class="col-12">
            <div class="form-group">
               <label for="email">Email address</label>
               <input
                  type="email"
                  class="form-control"
                  id="email"
                  aria-describedby="emailHelp"
                  v-model="form.email"
               />
               <small id="emailHelp" class="form-text text-muted"
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
                  id="message"
                  rows="9"
                  v-model="form.message"
               ></textarea>
               <small id="messageHelp" class="form-text text-muted"
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
import Alert from "../Alert.vue";

export default {
   name: "Contacts",
   components: {
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
            type: "",
         },
      };
   },
   methods: {
      sendForm() {
         const params = {
            email: this.form.email,
            message: this.form.message,
         };
         axios
            .post("http://localhost:8000/api/messages", params)
            .then((res) => {
               this.form.email = "";
               this.form.message = "";

               this.alert.message = "Message sent!";
               this.alert.type = "success";
            })
            .catch((err) => {})
            .then(() => {});
      },
   },
};
</script>

<style>
</style>