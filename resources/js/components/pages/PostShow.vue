<template>
   <div class="container">
      <div class="row">
         <div class="col-12 my-3">
            <h1>Post "{{ post.title }}" Details</h1>
         </div>
         <Loader v-if="is_loading" />
         <div class="col-6 offset-3 my-3">
            <PostCard :post="post" :onShow="onShow" />
         </div>
      </div>
   </div>
</template>

<script>
import PostCard from "../posts/PostCard.vue";
import Loader from "../Loader.vue";

export default {
   name: "PostShow",
   components: {
      PostCard,
      Loader,
   },
   data() {
      return {
         is_loading: false,
         post: [],
         onShow: false,
      };
   },
   methods: {
      getPost() {
         this.is_loading = true;
         axios
            .get("http://localhost:8000/api/posts/" + this.$route.params.slug)
            .then((res) => {
               this.post = res.data;
            })
            .catch((err) => {
               console.error(err);
            })
            .then(() => {
               this.is_loading = false;
            });
      },
   },
   mounted() {
      this.getPost();
   },
};
</script>

<style>
</style>