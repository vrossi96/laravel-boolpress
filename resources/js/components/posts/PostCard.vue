<template>
   <div class="col-4 my-3">
      <div class="card">
         <img v-if="post.img" class="card-img-top" src="#" :alt="post.slug" />
         <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">
               {{ post.content }}
            </p>
            <a href="#" class="btn btn-primary">Helo</a>
         </div>
      </div>
   </div>
</template>

<script>
export default {
   name: "PostCard",
   props: ["post"],
};
</script>

<style type="scss" scoped>
</style>