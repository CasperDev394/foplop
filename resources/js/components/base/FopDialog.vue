<template>
    <div class="modalShadow" :class="{visible}" :id="id+'Shadow'">
        <dialog
            :id="id"
            v-if="visible"
            style="visibility: visible; display: flex; max-height: 95vh; max-width: 90%; align-items: flex-end;"
        >
            <n-button class="btn-close-dialog" strong secondary circle @click="hide">
                <font-awesome-icon :icon="['fas', 'xmark']" />
            </n-button>
            <div class="modal-dialog-content">
                <div :id="id+'Body'" class="modal-dialog-body" :class="{body_overflow: overflow}">
                    <slot></slot>
                </div>
                <footer>
                    <slot name="footer"></slot>
                </footer>
            </div>
        </dialog>
    </div>
</template>
<script>

export default {
    name: "YoloDialog",

    props: {
        id: {default: 'vdialog'},
        overflow: {default: false},
        hideClose: {default: false},
    },

    data() {
        return {
            visible: false,
        }
    },
    methods: {
        show() {
            return new Promise((resolve, reject) => {
                this.$nextTick().then(() => {
                    this.visible = true;
                    this.$emit('shown');
                    resolve(this);
                });
            })
        },
        hide() {
            return new Promise((resolve, reject) => {
                this.visible = false;
                this.$emit('hidden');
                resolve(this);
            })
        },
        toggle() {
            if (this.visible) {
                return this.hide();
            } else {
                return this.show();
            }
        },
    },
}

</script>
<style lang="scss" scoped>
@import '/resources/sass/_variables.scss';

.btn-close-dialog{
    position: absolute;
    top: 0;
    right: 0;
    margin: 5px;
    border: none;
    border-radius: 12px;
    background-color: #ddd;
    padding: 0;
    width: 20px;
    height: 20px;
}
.btn-close-dialog:hover {
    background-color: #666666
}

.modalShadow {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: none;
    visibility: hidden;
    margin: 0;
    padding: 0;
    text-align: center;
    z-index: 1000;
    background-color: rgba(255, 255, 255, 0.8);
    & dialog {
        box-shadow: 0 0 49px -10px rgba(34, 60, 80, 0.6);
        border: none;

        min-width: 40%;
        flex-direction: column;
        overflow: auto;
    }
}
.modalShadow.visible {
    visibility: visible;
    display: block;
}
.modalShadow.visible dialog {
    margin-top: 25px;
    transition: all 0.2s ease-in;
    opacity: 1;
}

.body_overflow {
    overflow: visible !important;
}
.modalShadow {
    /*z-index: 10000;*/

    & dialog .modal-dialog-content {
        display: flex;
        flex-direction: column;
        height: auto;
        width: 100%;
        margin-top: -5px;

        & footer {
            height: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    }

    dialog .modal-dialog-content .modal-dialog-body {
        overflow-x: auto;
    }

    &_without-overflow {
        & dialog {
            overflow: unset !important;
        }

        & .modal-dialog-body {
            overflow: unset !important;
        }
    }
}

table.grid > tr > td {
    border: 5px solid transparent;
}
</style>
