<script>
import FormLayout from "@/Layouts/FormLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";

export default {
    components: {
        FormLayout,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
    },
    props: {
        user: Object,
    },
    setup(props) {
        // Set props in form
        const form = useForm({
            name: props.user.name,
            stadt: props.user.city,
            bundesland: props.user.state,
            strasse: props.user.street,
            hausnummer: props.user.house_number,
            plz: props.user.postal_code,
            telefonnummer: props.user.phone_number,
        });
        // Submit update form with user id
        const submit = () => {
            form.patch(route("profile.update", props.user.id));
        };
        return { form, submit };
    },
};
</script>

<template>
    <FormLayout page="Profile">
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" class="text-white" />
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full text-black"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="stadt" value="Stadt" class="text-white" />
                <TextInput
                    id="stadt"
                    type="text"
                    class="mt-1 block w-full text-black"
                    v-model="form.stadt"
                    required
                    autocomplete="stadt"
                />
                <InputError class="mt-2" :message="form.errors.stadt" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="bundesland"
                    value="Bundesland"
                    class="text-white"
                />
                <TextInput
                    id="bundesland"
                    type="text"
                    class="mt-1 block w-full text-black"
                    v-model="form.bundesland"
                    required
                    autocomplete="bundesland"
                />
                <InputError class="mt-2" :message="form.errors.bundesland" />
            </div>

            <div class="mt-4">
                <InputLabel for="strasse" value="Straße" class="text-white" />
                <TextInput
                    id="strasse"
                    type="text"
                    class="mt-1 block w-full text-black"
                    v-model="form.strasse"
                    required
                    autocomplete="strasse"
                />
                <InputError class="mt-2" :message="form.errors.strasse" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="hausnummer"
                    value="Haus Nummer"
                    class="text-white"
                />
                <TextInput
                    id="hausnummer"
                    type="text"
                    class="mt-1 block w-full text-black"
                    v-model="form.hausnummer"
                    required
                    autocomplete="hausnummer"
                />
                <InputError class="mt-2" :message="form.errors.hausnummer" />
            </div>

            <div class="mt-4">
                <InputLabel for="plz" value="Plz" class="text-white" />
                <TextInput
                    id="plz"
                    type="text"
                    class="mt-1 block w-full text-black"
                    v-model="form.plz"
                    required
                    autocomplete="plz"
                />
                <InputError class="mt-2" :message="form.errors.plz" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="telefonnummer"
                    value="Telefon Nummer"
                    class="text-white"
                />
                <TextInput
                    id="telefonnummer"
                    type="text"
                    class="mt-1 block w-full text-black"
                    v-model="form.telefonnummer"
                    required
                    autocomplete="telefonnummer"
                />
                <InputError class="mt-2" :message="form.errors.telefonnummer" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Profil aktualisieren
                </PrimaryButton>
            </div>
        </form>
    </FormLayout>
</template>
