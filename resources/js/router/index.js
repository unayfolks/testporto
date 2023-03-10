import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'

/* Guest Component */
const Login = () => import('@/components/Login.vue')
const Register = () => import('@/components/Register.vue')
/* Guest Component */

/* Layouts */
const DahboardLayout = () => import('@/components/layouts/Default.vue')
/* Layouts */

/* Authenticated Component */
const Dashboard = () => import('@/components/Dashboard.vue')
const Add = () => import('@/pages/Add.vue')
/* Authenticated Component */
const GuestPage = () => import('@/pages/GuestPage.vue')
const SongPage = () => import('@/pages/SongPages.vue')
const SongDetail = () => import('@/pages/SongDetail.vue')
const Soal = () => import('@/pages/Soal.vue')
const SoalDetail = () => import('@/pages/SoalDetail.vue')
const ManageSoal = () => import('@/pages/ManageSoal.vue')
const TambahSoal = () =>import('@/pages/TambahSoal.vue')

const routes = [
    {
        name: "mainpage",
        path: "/",
        component: GuestPage,
        props: true,
        meta: {
            middleware: "guest",
            title: `mainpage`
        },
        children: [
            {
                name: "songpages",
                path: '/songpages',
                component: SongPage,
                props: true,
                meta: {
                    title: `Song Pages`
                }
            },
            {
                name: "song",
                path: '/songpages/:id',
                component: SongDetail,
                props: true,
                meta: {
                    title: `Song Pages`
                }
            },
            {
                name: "soal",
                path: '/soal',
                component: Soal,
                props: true,
                meta: {
                    title: `Soal`
                }
            },
            {
                name: "soaldetail",
                path: '/soal/:id/:nama',
                component: SoalDetail,
                props: true,
                meta: {
                    title: `Soal`
                }
            },
        ]
    },
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            middleware: "guest",
            title: `Register`
        }
    },
    {
        path: "/mainboard",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "dashboard",
                path: '/mainboard',
                component: Dashboard,
                meta: {
                    title: `Dashboard`
                }
            },
            {
                name: "add",
                path: '/add',
                component: Add,
                meta: {
                    title: `Add`
                }
            },
            {
                name: "managesoal",
                path: '/managesoal',
                component: ManageSoal,
                meta: {
                    title: `Manajemen Soal`
                },
            },
            {
                name: "tambahsoal",
                path: '/managesoal/tambahsoal',
                component: TambahSoal,
                props: true,
                meta: {
                    title: `Tambah Soal`
                }
            }
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})

export default router
