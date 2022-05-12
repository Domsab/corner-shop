<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>

</template>

<script>
import { ref } from 'vue'
import {
  Dialog,
  DialogOverlay,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
  Tab,
  TabGroup,
  TabList,
  TabPanel,
  TabPanels,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import { MenuIcon, SearchIcon, ShoppingCartIcon, UserIcon, XIcon } from '@heroicons/vue/outline'
import axios from 'axios'

const currencies = ['CAD', 'USD', 'AUD', 'EUR', 'GBP']

export default {
  components: {
    Dialog,
    DialogOverlay,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
    MenuIcon,
    SearchIcon,
    ShoppingCartIcon,
    UserIcon,
    XIcon,
  },
  setup() {
    const open = ref(false)

    return {
        open,
        currencies,
    }
  },

  data(){
    return {
        navigation: [],
    }
  },

  methods: {
      get() {
          axios.get('/navigation').then( response => {
              console.log(response.data.data);
              this.navigation = response.data.data;
          });
      }
  },
  mounted() {
      this.get();
  },
}
</script>
