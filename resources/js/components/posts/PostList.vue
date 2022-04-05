<template>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <nav aria-label="Page navigation example">
               <ul class="pagination">
                  <li class="page-item">
                     <a class="page-link" href="#">Previous</a>
                  </li>
                  <li
                     v-for="page in pages.lastPage"
                     :key="page"
                     class="page-item"
                     :class="{ active: page === pages.currentPage }"
                  >
                     <a class="page-link" href="#">{{ page }}</a>
                  </li>
                  <li class="page-item">
                     <a class="page-link" href="#">Next</a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
      <div class="row">
         <PostCard v-for="post in posts" :key="post.id" :post="post" />
      </div>
   </div>
</template>

<script>
import PostCard from "./PostCard.vue";

export default {
   name: "PostList",
   components: {
      PostCard,
   },
   props: ["posts", "pages"],
};
</script>

<style type="scss" scoped>
.container {
   margin-top: 50px;
}
</style>
