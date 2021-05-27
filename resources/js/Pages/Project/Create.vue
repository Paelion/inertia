<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Créer un projet
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
          <form @submit.prevent="save">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-4">
                <jet-label for="client" value="Client"/>
                <select id="client"  class="block mt-1 w-full" name="client" v-model="form.client">
                  <option value="" disabled selected>Séléctionner un client</option>
                  <option v-for="client in clients" :value="client.company_name">
                    {{ client.company_name }}
                  </option>
                </select>
                <jet-input-error :message="form.errors.client" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="lastname" value="Nom"/>
                <jet-input id="lastname" type="lastname" class="mt-1 block w-full" v-model="form.lastname"
                           ref="lastname" autocomplete="lastname"/>
                <jet-input-error :message="form.errors.lastname" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="firstname" value="Prénom"/>
                <jet-input id="firstname" type="firstname" class="mt-1 block w-full" v-model="form.firstname"
                           ref="firstname" autocomplete="firstname"/>
                <jet-input-error :message="form.errors.firstname" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Téléphone"/>
                <jet-input id="phone" type="phone" class="mt-1 block w-full" v-model="form.phone"
                           ref="phone" autocomplete="phone"/>
                <jet-input-error :message="form.errors.phone" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email"/>
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                           ref="email" autocomplete="email"/>
                <jet-input-error :message="form.errors.email" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="title" value="Titre"/>
                <jet-input id="title" type="title" class="mt-1 block w-full" v-model="form.title"
                           ref="title" autocomplete="title"/>
                <jet-input-error :message="form.errors.title" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description"/>
                <textarea class="mt-1 block w-full" name="description" cols="10" rows="10"
                          v-model="form.description"></textarea>
                <jet-input-error :message="form.errors.description" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="start_date" value="Début du projet"/>
                <jet-input id="start_date" type="date" class="mt-1 block w-full" v-model="form.start_date"
                           ref="start_date" autocomplete="start_date"/>
                <jet-input-error :message="form.errors.start_date" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="end_date" value="Fin estimée du projet"/>
                <jet-input id="end_date" type="date" class="mt-1 block w-full" v-model="form.end_date"
                           ref="end_date" autocomplete="end_date"/>
                <jet-input-error :message="form.errors.end_date" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="zip_code" value="Code Postal"/>
                <jet-input id="zip_code" type="zip_code" class="mt-1 block w-full" v-model="form.zip_code"
                           ref="zip_code" autocomplete="zip_code"/>
                <jet-input-error :message="form.errors.zip_code" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="status" value="Statut du projet"/>
                <select id="status" class="block mt-1 w-full" name="status" v-model="form.status">
                  <option value="" disabled selected>Séléctionner un statut</option>
                  <option value="1">
                    Treminé
                  </option>
                  <option value="2">
                    En cours
                  </option>
                  <option value="3">
                    Annulé
                  </option>
                </select>
                <jet-input-error :message="form.errors.status" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="paied_days" value="Nombre de jours vendus"/>
                <jet-input id="paied_days" type="paied_days" class="mt-1 block w-full" v-model="form.paied_days"
                           ref="paied_days" autocomplete="paied_days"/>
                <jet-input-error :message="form.errors.paied_days" class="mt-2"/>
              </div>
            </div>

            <jet-button :class="{ 'opacity-25': form.processing }" class="mt-5" :disabled="form.processing">
              Sauvegarder
            </jet-button>
          </form>
          <jet-button @click="cancel" class="mt-5">
            Annuler
          </jet-button>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import JetButton from '@/Jetstream/Button'

export default {
  props: ['errors', 'clients'],
  components: {
    AppLayout,
    JetInput,
    JetInputError,
    JetLabel,
    JetButton
  },
  data() {
    return {
      form: this.$inertia.form({
        client: '',
        lastname: '',
        firstname: '',
        phone: '',
        email: '',
        title: '',
        description: '',
        start_date: '',
        end_date: '',
        status: '',
        paied_days: ''
      })
    }
  },
  methods: {
    save() {
      this.form.post(this.route('project.store'), this.form);
    },
    cancel(){
      this.$inertia.visit(this.route('project.index'));
    }
  }
}
</script>
