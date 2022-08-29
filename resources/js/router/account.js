import Profile from '../pages/account/Profile'
import UserOrders from '../pages/account/UserOrders'

export default [
        {
            name: 'account-profile',
            path: '/account-profile',
            component: Profile,
        },
        {
            name: 'account-orders',
            path: '/account-orders',
            component: UserOrders,
        },
    ]
