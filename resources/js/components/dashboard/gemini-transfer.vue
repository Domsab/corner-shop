<template>
    <div>
        <div class="flex flex-row flex-wrap flex-grow w-full">
            <div class="flex-row w-full py-3 border-b-2 border-gray">
                <p class="py-1 text-base font-medium">
                    XO Balance: {{ currentUser.balance }}
                </p>
            </div>

            <form>
                <div class="flex-row flex-wrap p-4">
                    <select
                        class="w-full p-4 px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                        v-model="form.transaction.recipientAccounts"
                    >
                        <option
                            v-for="(account, key) in userAccounts"
                            :value="key"
                            :key="key"
                        >
                            {{ account.username }}
                        </option>
                    </select>
                </div>

                <div class="flex flex-row flex-grow w-full py-3">
                    <input
                        class="w-full p-4 px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                        type="text"
                        v-model="form.transaction.value"
                        placeholder="Xo Amount :20.00"
                    />
                </div>

                <div class="flex flex-row flex-grow w-full py-3">
                    <button
                        class="flex flex-grow px-4 py-2 mr-4 text-white bg-blue-500 rounded hover:bg-blue-700"
                        @click.prevent="transferTokens"
                    >
                        Send Xo
                    </button>
                </div>
            </form>

        </div>
    </div>
</template>

<script>
import Modal from '../../components/Modal.vue';
// import MetricCard from "../components/cards/metric-card";

export default {
    name: "TransactionTransfer",

    components: {
        Modal,
        // MetricCard,
    },
    props: {
        message: {
            type: String,
            default: "",
        },
        userType: {
            type: String,
            default: "",
        },
        currentUser: {
            type: Object,
            default: function () {
                return {};
            },
        },
        userAccounts: {
            type: Array,
            default: function () {
                return [];
            },
        },
        recipientAccounts: {
            type: Array,
            default: function () {
                return [];
            },
        },
    },
    data() {
        return {
            showModal: false,
            value: "",
            form: {
                transaction: {
                    recipientAccounts: "",
                    value: "",
                },
                switch: {
                    userId: "",
                },
            },
        };
    },
    methods: {
        transferTokens() {
            // this.$store.dispatch("transactionTransfer", this.form.transaction);
        },
        changeUser() {
            // this.userType === "user"
                // ? this.$store.dispatch("setUser", this.form.switch.userId)
                // : this.$store.dispatch("setAdminUser", this.form.switch.userId);

            this.showModal = false;
        },
    },
    mounted() {
        console.log("Mounted");
    },
};
</script>

<style scoped></style>
