<template>
   <div class="container">
      <div>
         <h1>Page not found</h1>
         <button class="btn btn-primary" @click="$router.back()">
            Go Back
         </button>
      </div>
   </div>
</template>

<script>
export default {
   name: "NotFoundPage",
};
</script>

<style>
</style>