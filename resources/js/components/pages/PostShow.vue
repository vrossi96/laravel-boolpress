<template>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <h1>Post Details</h1>
         </div>
         <PostCard :post="post" :onShow="onShow" />
      </div>
   </div>
</template>

<script>
import PostCard from "../posts/PostCard.vue";
export default {
   name: "PostShow",
   components: {
      PostCard,
   },
   data() {
      return {
         post: [],
         onShow: false,
      };
   },
   methods: {
      getPost() {
         axios
            .get("http://localhost:8000/api/posts/" + this.$route.params.slug)
            .then((res) => {
               this.post = res.data;
            })
            .catch((err) => {
               console.error(err);
            })
            .then(() => {});
      },
   },
   mounted() {
      this.getPost();
   },
};
</script>

<style>
</style>