<template>
    <div>
        <div><h1>This is start component</h1></div>
        <app-articles :msg="message" @changeMess="result = $event"></app-articles>
        <h3>{{ result }}</h3>
    </div>
</template>


<script>

    import Articles from './ArticleComponent.vue'

    export default {
        data () {
            return {
                message : 'Vue Message',
                result : '',
            }
        },
        components : {
            'app-articles' : Articles
        }
    }
</script>
