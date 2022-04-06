<template>
   <div class="container">
      <div class="row">
         <div class="col-12 my-3">
            <h1>Post "{{ post.title }}" Details</h1>
         </div>
         <div class="col-12">
            <Alert v-if="isError && !isLoading" :type="error.type">
               <p class="m-0">{{ error.message }}</p>
            </Alert>
         </div>
         <Loader v-if="isLoading" />
         <div class="col-6 offset-3 my-3">
            <PostCard :post="post" :onShow="onShow" />
         </div>
      </div>
   </div>
</template>

<script>
import PostCard from "../posts/PostCard.vue";
import Loader from "../Loader.vue";
import Alert from "../Alert.vue";

export default {
   name: "PostShow",
   components: {
      PostCard,
      Loader,
      Alert,
   },
   data() {
      return {
         isError: false,
         isLoading: false,
         error: {
            message: "An error has occurred",
            type: "danger",
         },
         post: [],
         onShow: false,
      };
   },
   methods: {
      getPost() {
         this.isLoading = true;
         axios
            .get("http://localhost:8000/api/posts/" + this.$route.params.slug)
            .then((res) => {
               this.post = res.data;
            })
            .catch((err) => {
               console.error(err);
               this.isError = true;
            })
            .then(() => {
               this.isLoading = false;
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