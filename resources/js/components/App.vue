<template>
   <div>
      <Header />
      <div>
         <Loader v-if="is_loading" />
         <PostList v-else :posts="posts" :pages="pages" />
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
         pages: {},
         is_loading: true,
      };
   },
   methods: {
      getPosts(pg = 1) {
         axios
            .get("http://localhost:8000/api/posts?page=" + pg)
            .then((res) => {
               const { data, current_page, last_page } = res.data;
               this.posts = data;
               this.pages = {
                  currentPage: current_page,
                  lastPage: last_page,
               };
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
