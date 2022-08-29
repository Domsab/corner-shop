
import axios from 'axios'
import { defineStore, acceptHMRUpdate } from 'pinia'

export const useShoppingCartStore = defineStore({
    id: 'shoppingCartStore',

    state: () => ({
        bagItems: [],
        total: '',
        subTotal: '',
        open: false,
    }),

    getters: {
        items: (state) =>
            state.bagItems.reduce((items, item) => {
                const existingItem = items.find((it) => it.name === item)

                if (!existingItem) {
                    items.push({ ...item, amount: 1 })
                } else {
                    existingItem.amount++
                }

                return items
            }, []),
    },

    actions: {
        open() {
            this.open = true
        },

        close() {
            this.open = false
        },

        getShopping() {
            axios.get(`/shopping-bag`)
                .then(response => {
                    const data = response.data.data
                    console.log('getShopping', data);

                    this.bagItems = data.items
                    this.total = data.total
                    this.subTotal = data.subTotal
                })
        },

        addItem(productId) {
            axios.post(`/shopping-bag`, { 'id': productId })
                .then((response) => {
                    const data = response.data.data
                    console.log('Add item', response.data.data)

                    this.bagItems = data.items
                    this.total = data.total
                    this.subTotal = data.subTotal
                });

            console.log('Bag Items', this.bagItems)
        },

        removeItem(bagId) {
            axios.delete(`/shopping-bag/${bagId}`)
                .then((response) => {
                    const data = response.data.data
                    console.log('Remove item', response.data.data)

                    this.bagItems = data.items
                    this.total = data.total
                    this.subTotal = data.subTotal
                })
        },

        async purchaseItems() {
            const user = useUserStore()
            if (!user.name) return

            console.log('Purchasing', this.items)
            const n = this.items.length
            this.bagItems = []

            return n
        },
    },
})

if (import.meta.hot) {
    import.meta.hot.accept(acceptHMRUpdate(useShoppingCartStore, import.meta.hot))
}
