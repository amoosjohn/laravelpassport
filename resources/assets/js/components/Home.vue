<!-- ./resources/assets/js/components/Home.vue -->
<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <div class="form-group">
          <label for="title">Post Title</label>
          <input v-model="newPostTitle" id="title" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="description">Post Description</label>
          <textarea v-model="newPostDesc" id="description" rows="8" class="form-control"></textarea>
        </div>
        <button @click="addPost(newPostTitle, newPostDesc)" 
          :class="{disabled: (!newPostTitle || !newPostDesc)}"
          class="btn btn-block btn-primary">Submit</button>
      </div>
    </div>
  </div>
</template>
