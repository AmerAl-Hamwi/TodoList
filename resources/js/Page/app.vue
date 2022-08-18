<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-item-form />
        </div>
        <list-view :items="items"/>
    </div>
</template>

<script>
import axios from "axios";
import addItemForm from "./addItemForm.vue";
import listView from "./listView.vue";

export default {
    components: {
        addItemForm,
        listView,
    },
    data: function () {
        return {
            items: []
        }
    },
    methods :{
        getList() {
            axios.get('api/items')
            .then(Response => {
                this.items = response.data
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
    created(){
        this.getList();
    }
};
</script>

<style scoped>

.todoListContainer {
    width: 550px;
    margin: auto;
}

.heading {
    background-color: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}
</style>
