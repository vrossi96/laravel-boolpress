<template>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <nav>
               <ul class="pagination">
                  <li
                     class="page-item"
                     v-if="pages.currentPage > 1"
                     @click="$emit('change-page', pages.currentPage - 1)"
                  >
                     <a class="page-link" href="#">Previous</a>
                  </li>
                  <li
                     v-for="page in pages.lastPage"
                     :key="page"
                     class="page-item"
                     :class="{ active: page === pages.currentPage }"
                     @click="$emit('change-page', page)"
                  >
                     <span role="button" class="page-link">{{ page }}</span>
                  </li>
                  <li
                     class="page-item"
                     v-if="pages.lastPage > pages.currentPage"
                     @click="$emit('change-page', pages.currentPage + 1)"
                  >
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
