<template>
    <div>
        <h2>This is Articles component inside Start Component</h2>
        <h3>{{ msg }}</h3>
        <input type="text" v-on:input="responceMessage" />
        <p>{{ childmessage }}</p>

    </div>
</template>


<script>
    export default {
        props : ['msg'],
        data () {
            return {
                childmessage : 'qwe',
            }
        },
        methods : {
            responceMessage (event) {
                // alert('t');
                // console.log(event.target.value);
                this.childmessage = event.target.value;
                this.$emit('changeMess', this.childmessage);
            }
        },
        // data () {
        //     return  {
        //         mess : 'dynamic vue text',
        //     }
        // }
    }
</script>
