<template>
   <div class="container">
      <h1 class="mt-5 mb-3">Contact us!</h1>
      <p>
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore amet,
         sed magni deleniti nesciunt eos fugit, quo esse exercitationem maiores
         incidunt quia eaque repudiandae ratione dolorem eveniet ex, minima
         corporis?
      </p>
      <div class="row">
         <div class="col-12">
            <div class="form-group">
               <label for="email">Email address</label>
               <input
                  type="email"
                  class="form-control"
                  id="email"
                  aria-describedby="emailHelp"
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
               <textarea class="form-control" id="message" rows="9"></textarea>
               <small id="messageHelp" class="form-text text-muted"
                  >U can tell us, don't be shy.</small
               >
            </div>
         </div>
      </div>
   </div>
</template>

<script>
export default {
   name: "Contacts",
};
</script>

<style>
</style>