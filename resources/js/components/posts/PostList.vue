<template>
   <div class="container">
      <Loader v-if="isLoading" />
      <div>
         <div class="row">
            <div class="col-12">
               <PageNavigation :pages="pages" @change-page="getPosts" />
            </div>
         </div>
         <div class="row">
            <div class="col-6 my-3" v-for="post in posts" :key="post.id">
               <PostCard :post="post" :onShow="onShow" />
            </div>
         </div>
      </div>
   </div>
</template>

<script>
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";
import PageNavigation from "./PageNavigation.vue";

export default {
   name: "PostList",
   components: {
      PostCard,
      Loader,
      PageNavigation,
   },
   props: [],
   data() {
      return {
         posts: [],
         pages: {},
         isLoading: false,
         onShow: true,
      };
   },
   methods: {
      getPosts(pg = 1) {
         this.isLoading = true;
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
               this.isLoading = false;
            });
      },
   },
   mounted() {
      this.getPosts();
   },
};
</script>

<style type="scss" scoped>
.container {
   margin-top: 50px;
}
</style>
