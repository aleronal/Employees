<template>
  <div>
        <VueTabulator v-model="data" :options="options" />

  </div>
</template>

<script>

export default {
    data() {
        return {
            data: [{
                name: 'Teste',
                age: 13
            },{
                name:'this',
                age: 15
            }],
            options: {
            layout:"fitColumns",
            autoColumns:true,
                columns: [{
                    title: 'Name',
                    field: 'name',
                    
                },{
                    title:'Age',
                    field:'age',
                   
                } ],
            }
        }
    },

}
</script>


<style lang='scss'>

@import "~vue-tabulator/dist/scss/bootstrap/tabulator_bootstrap4";

</style>
