<template>
    <tab
        :label="title"
        :item-header-class="tabClass"
    >
        <div class="row g-3">
            <form-group-field
                id="form_config_webhookurl"
                class="col-md-12"
                :field="v$.config.webhookurl"
                :label="$gettext('RadioReg Webhook URL')"
            />

            <form-group-field
                id="form_config_apikey"
                class="col-md-6"
                :field="v$.config.apikey"
                :label="$gettext('RadioRed Organization API Key')"
            />
        </div>
    </tab>
</template>

<script setup lang="ts">
import FormGroupField from "~/components/Form/FormGroupField.vue";
import {useVModel} from "@vueuse/core";
import {useVuelidateOnFormTab} from "~/functions/useVuelidateOnFormTab";
import {required} from "@vuelidate/validators";
import Tab from "~/components/Common/Tab.vue";

const props = defineProps({
    title: {
        type: String,
        required: true
    },
    form: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['update:form']);
const form = useVModel(props, 'form', emit);

const {v$, tabClass} = useVuelidateOnFormTab(
    {
        config: {
            webhookurl: {required},
            apikey: {required}
        }
    },
    form,
    {
        config: {
            webhookurl: '',
            apikey: ''
        }
    }
);
</script>
