<template>
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
</template>

<script>
export default {
   name: "PageNavigation",
   props: ["pages"],
};
</script>

<style>
</style>