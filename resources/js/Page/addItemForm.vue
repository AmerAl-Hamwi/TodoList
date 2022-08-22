<template>
    <div class="addItem">
        <input type="text" v-model="item.name" />
        <font-awesome-icon
            class="button"
            icon="plus-square"
            @click="addItem()"
            :class="[item.name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
import axios from "axios";

export default {
    data: function () {
        return {
            item: {
                name: "",
            },
        };
    },
    methods: {
        addItem() {
            if (this.item.name == "") {
                return;
            }

            axios
                .post("api/item", {
                    name: this.item.name,
                })

                .then((Response) => {
                    if (Response.data.status == 201) {
                        this.item.name == "";
                    }
                })

                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<style scoped>
.addItem {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background-color: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.button {
    font-size: 20px;
}
.plus {
    font-size: 20px;
}

.active {
    color: #00ce25;
}

.inactive {
    color: #999999;
}
</style>
