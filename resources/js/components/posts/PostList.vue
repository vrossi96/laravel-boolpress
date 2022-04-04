<template>
   <div class="container">
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
   props: ["posts"],
};
</script>

<style type="scss" scoped>
.container {
   margin-top: 50px;
}
</style>
