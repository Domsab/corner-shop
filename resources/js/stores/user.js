import { defineStore } from 'pinia'

export const useUserStore = defineStore({
    id: 'userStore',

    state: () => ({
        user: window.auth_user,
    }),

    getters: {
        isLoggedIn: (state) => {
            return state.user !== null
        }
    }
})
