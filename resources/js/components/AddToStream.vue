<template>
   <div class="message">
       <div class="message-header">
           Push to the Stream ...
       </div>

       <div class="message-body">
           <form action="" @submit.prevent="onSubmit" @keydown="form.errors.clear()">
               <p class="control">
                   <textarea name="" id="" cols="30" rows="10" class="textarea" v-model="form.body"></textarea>
                   <span class="help is-danger" v-if="form.errors.has('body')"
                         v-text="form.errors.get('body')"></span>
               </p>
               <p class="control">
                   <button class="button is-primary" :disabled="form.errors.any()" type="submit">Submit</button>
               </p>
           </form>
       </div>
   </div>
</template>

<script>
    export default {
        name: "AddToStream",
        data() {
          return {
              form : new Form({ body : ''})
          }
        },
        methods : {
            onSubmit() {
                this.form.post('/statuses')
                    .then(status => this.$emit('completed', status))
                //alert('all don !')
            }
        }
    }
</script>

<style scoped>

</style>
