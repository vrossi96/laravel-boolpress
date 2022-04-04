<template>
   <div>
      <Header />
      <PostList :posts="posts" />
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
      };
   },
   methods: {
      getPosts() {
         axios
            .get("http://localhost:8000/api/posts")
            .then((res) => {
               this.posts = res.data.posts;
            })
            .catch((err) => {
               console.error(err);
            })
            .then(() => {
               console.log("OK API");
               console.log(this.posts);
            });
      },
   },
   mounted() {
      this.getPosts();
   },
};
</script>
