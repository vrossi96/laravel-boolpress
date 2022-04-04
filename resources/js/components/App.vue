<template>
   <div>
      <Header />
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card mt-5">
                  <div class="card-header">Work in Progress</div>

                  <div class="card-body">Log in to start</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
import Header from "./components/Header.vue";

export default {
   name: "App",
   components: {
      Header,
   },
};
</script>
