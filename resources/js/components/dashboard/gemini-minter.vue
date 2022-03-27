<template>
    <div>
        <div class="flex flex-row flex-wrap flex-grow w-full">
            <div class="flex-row w-full py-3 border-b-2 border-gray">
                <p class="py-1 text-base font-medium">
                    XO Balance: {{ currentUser.balance }}
                </p>
            </div>

            <div class="flex-row w-full py-3 border-b-2 border-gray">
                <p class="py-1 text-base font-medium">
                    XO Circulation: {{ currentUser.balance }}
                </p>
            </div>

            <div class="flex-row w-full py-3 border-b-2 border-gray">
                <p class="py-1 text-base font-medium">
                    ETH Balance: {{ currentUser.balance }}
                </p>
            </div>

            <div class="flex flex-row flex-grow w-full py-3">
                <button
                    class="flex flex-grow px-4 py-2 mr-4 text-white bg-blue-500 rounded hover:bg-blue-700"
                    @click.prevent="showMinterModal = true"
                >
                    Mint Tokens
                </button>
            </div>

            <div class="flex flex-row flex-grow w-full py-3">
                <button
                    class="flex flex-grow px-4 py-2 mr-4 text-white bg-blue-500 rounded hover:bg-blue-700"
                    @click.prevent="showUserModal = true"
                >
                    Create a new user
                </button>
            </div>
        </div>

        <Modal v-show="showMinterModal" @close="showMinterModal = false">
            <h3
                class="text-base font-medium text-gray-900 modal-header dark:text-white"
                slot="header"
            >
                Mint New Tokens
            </h3>
            <div slot="body">
                <div>
                    <label
                        for="mintAmount"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Mint amount</label
                    >
                    <input
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        v-model="form.mint.amount"
                        name="mintAmount"
                        placeholder="Xo Amount :20.00"
                    />
                </div>
            </div>
            <div slot="footer">
                <button
                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700"
                    @click="minter"
                >
                    Mint
                </button>
                |
                <button
                    class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700"
                    @click="showMinterModal = false"
                >
                    Cancel
                </button>
            </div>
        </Modal>

        <Modal v-show="showUserModal" @close="showUserModal = false">
            <h3
                class="text-base font-medium text-gray-900 modal-header dark:text-white"
                slot="header"
            >
                Create a new User
            </h3>
            <div slot="body">
                <div>
                    <label
                        for="username"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Username</label
                    >
                    <input
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        v-model="form.user.username"
                        name="username"
                    />
                </div>
                <div>
                    <label
                        for="username"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >User type</label
                    >
                    <select
                        type="select"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        v-model="form.user.type"
                        name="userType"
                    >
                        <option value="2">Originator/Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Your email</label
                    >
                    <input
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        v-model="form.user.email"
                        name="email"
                    />
                </div>
                <div>
                    <label
                        for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Your password</label
                    >
                    <input
                        type="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        v-model="form.user.password"
                        name="password"
                    />
                </div>
                <div>
                    <label
                        for="phone"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Your mobile (optional)</label
                    >
                    <input
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        v-model="form.user.phone"
                        name="phone"
                    />
                </div>
            </div>
            <div slot="footer">
                <button
                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700"
                    @click="createUser"
                >
                    Save
                </button>
                |
                <button
                    class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700"
                    @click="showUserModal = false"
                >
                    Cancel
                </button>
            </div>
        </Modal>
    </div>
</template>

<script>
// import { mapState } from "vuex";
import Modal from '../../components/Modal.vue';

export default {
    name: "TransactionsMinter",

    computed: {
        // ...mapState(["user"]),
    },

    components: {
        Modal,
    },

    created() {
        console.log("Minter Created WILL THIS CHANGE");
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
        recipientAccounts: {
            type: Array,
            default: function () {
                return [];
            },
        },
    },

    data() {
        return {
            value: "",
            usersAccount: "",
            selectedAccount: "",
            showUserModal: false,
            showMinterModal: false,
            form: {
                user: {
                    username: "",
                    email: "",
                    password: "",
                    phone: "",
                    type: "",
                },
                mint: {
                    amount: 50,
                },
            },
        };
    },

    methods: {
        createUser() {
            const payload = {
                username: this.form.user.username,
                password: this.form.user.password,
                email: this.form.user.email,
                phone: this.form.user.phone,
            };
            // this.$store.dispatch("createAdminAccount", payload);
        },

        minter() {
            // this.$store.dispatch("mintTokens", this.form.mint);
        },

        generateOriginators() {
            // this.$store.dispatch("tempInitDemoData");
        },
    },

    mounted() {},
};
</script>

<style scoped></style>
