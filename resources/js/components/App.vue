<template>
   <div>
      <Header />
      <div>
         <Loader v-if="is_loading" />
         <PostList v-else :posts="posts" />
      </div>
   </div>
</template>

<script>
import Header from "./Header.vue";
import Loader from "./Loader.vue";
import PostList from "./posts/PostList.vue";

export default {
   name: "App",
   components: {
      Header,
      Loader,
      PostList,
   },
   data() {
      return {
         posts: [],
         is_loading: true,
      };
   },
   methods: {
      getPosts() {
         axios
            .get("http://localhost:8000/api/posts")
            .then((res) => {
               this.posts = res.data.data;
            })
            .catch((err) => {
               console.error(err);
            })
            .then(() => {
               console.log("OK API");
               this.is_loading = false;
            });
      },
   },
   mounted() {
      this.getPosts();
   },
};
</script>
