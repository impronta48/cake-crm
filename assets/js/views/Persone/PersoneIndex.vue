<template>
  <div>
    <b-form action="" method="GET">
      <b-container>
        <fieldset class="border p-3">
          <legend class="w-auto p-2">Filtri</legend>
          <b-row>
            <b-col sm="3">
              <label for="q">Testo Libero</label>
            </b-col>
            <b-col>
              <b-form-input
                placeholder="Cerca"
                name="q"
                v-model="q"
                type="search"
              ></b-form-input>
            </b-col>
          </b-row>

          <b-row>
            <b-col sm="3">
              <label for="tags">Tags</label>
            </b-col>
            <b-col>
              <v-select
                placeholder="Tags"
                :options="tagList"
                name="tags"
                v-model="tagArray"
                multiple
                label="name"
                @search="fetchTags"
                style="width: 100%"
              >
              </v-select>
            </b-col>
          </b-row>

          <b-row>
            <b-col sm="3">
              <label for="tags">Provincia</label>
            </b-col>
            <b-col>
              <b-form-input
                name="provincia"
                v-model="provincia"
                placeholder="Provincia"
                size="2"
                type="text"
                style="width: 5em"
                title="Puoi separare più sigle di Province con la virgola"
                v-b-tooltip.hover
              />
            </b-col>
          </b-row>

          <b-row>
            <b-col sm="3">
              <label for="tags">Nazione</label>
            </b-col>
            <b-col>
              <b-form-input
                name="nazione"
                v-model="nazione"
                placeholder="Nazione"
                title="Puoi separare più sigle di Nazione con la virgola"
                v-b-tooltip.hover
              />
            </b-col>
          </b-row>

          <b-row>
            <b-col sm="3">
              <label for="tags">Permessi</label>
            </b-col>
            <b-col>
              <b-select
                name="accetta_newsletter"
                v-model="accetta_newsletter"
                title="Accetta Newsletter"
                v-b-tooltip.hover
                :options="ynempty"
                >Accetta Newsletter</b-select
              >
            </b-col>
          </b-row>

          <b-button
            class="float-right"
            type="submit"
            @click.prevent="search()"
            variant="primary"
            >Filtra</b-button
          >
        </fieldset>

        <b-row cols="12" class="float-right mt-4">
          <b-col>
            <b-link
              class="btn btn-primary btn-sm"
              :href="`/campaigns/edit${qString}`"
              title="Invia mail alla lista"
              v-b-tooltip.hover
              size="sm"
            >
              <b-icon-envelope-fill></b-icon-envelope-fill>
              Invia Mail
            </b-link>
            <b-link
              class="btn btn-primary btn-sm"
              @click="addTag()"
              title="Aggiungi tag ai selezionati"
              v-b-tooltip.hover
              size="sm"
            >
              <b-icon-tags> </b-icon-tags> Aggiungi Tag
            </b-link>
            <b-link
              class="btn btn-primary btn-sm"
              href="/persone/add"
              title="Aggiungi una persona"
              v-b-tooltip.hover
              size="sm"
            >
              <b-icon-plus-circle> </b-icon-plus-circle> Aggiungi Contatto
            </b-link>
            <b-link
              class="btn btn-primary btn-sm"
              @click="deleteMulti()"
              title="Elimina righe selezionate"
              v-b-tooltip.hover
              size="sm"
            >
              <b-icon-trash> </b-icon-trash> Elimina
            </b-link>
          </b-col>
        </b-row>
      </b-container>


      <b-table
        :items="fetchRows"
        :fields="colonne"
        class="mt-2"
        :sort-by.sync="sortBy"
        :sort-desc.sync="sortDesc"
        :busy.sync="isBusy"
        id="contacts"
        striped
        ref="tab"
        selectable
        select-mode="multi"
        @row-selected="onRowSelected"
      >
        <!-- A custom formatted header cell for field 'id' -->
        <template #head(id)>
          <b-form-checkbox
            id="checkbox-1"
            v-model="selectAllStatus"
            name="checkbox-1"
            :value="true"
            :unchecked-value="false"
            @change="selectAllRows()"
          >
          </b-form-checkbox>
        </template>

        <!-- Example scoped slot for select state illustrative purposes -->
        <template #cell(id)="{ rowSelected }">
          <template v-if="rowSelected">
            <span aria-hidden="true">
              <b-icon icon="check-square"></b-icon>
            </span>
            <span class="sr-only">Selected</span>
          </template>
          <template v-else>
            <span aria-hidden="true">
              <b-icon icon="square"></b-icon>
            </span>
            <span class="sr-only">Not selected</span>
          </template>
        </template>

        <template v-slot:cell(modified)="row">
          {{ niceDate(row.item.modified) }}
        </template>

        <template v-slot:cell(DisplayName)="row">
          <span v-if="row.item.DisplayName">{{ row.item.DisplayName }}</span>
          <span v-else
            >{{ row.item.Nome }} {{ row.item.Cognome }}
            {{ row.item.Societa }}</span
          >
          <span v-if="row.item.item">
          <b-badge
            variant="primary"
            v-for="b in row.item.tag_list.split(',')"
            class="mr-1"
            :key="b.row.item.tag"
            >
            {{ b }}
         </b-badge>
          </span>
         <br />
          <small
            class="text-muted"
            v-if="
              row.item.DisplayName != `${row.item.Nome} ${row.item.Cognome}`
            "
            >{{ row.item.Nome }} {{ row.item.Cognome }}
            {{ row.item.Societa }}</small
          >
        </template>

        <template v-slot:cell(azioni)="row">
          <b-link class="action" :to="`/persone/edit/${row.item.id}`">
            <b-icon-pencil></b-icon-pencil>
          </b-link>
          <b-link class="action" @click.prevent="delPersone(row.item.id)">
            <b-icon-trash></b-icon-trash>
          </b-link>
          <a class="action" :href="`/attivita/add/${row.item.id}`">
            <b-icon-bullseye></b-icon-bullseye>
          </a>
        </template>
      </b-table>
    </b-form>

    <ul class="pagination justify-content-center pagination-md">
      <li class="page-item">
        <a
          class="page-link"
          @click.prevent="changePage(pagination.page - 1)"
          :disabled="pagination.page <= 1"
          >«</a
        >
      </li>
      <li
        v-for="page in pages"
        class="page-item"
        :class="isCurrentPage(page) ? 'active' : ''"
        :key="page"
      >
        <a
          class="page-link"
          :class="isCurrentPage(page) ? 'active' : ''"
          @click.prevent="changePage(page)"
          >{{ page }}</a
        >
      </li>
      <li class="page-item">
        <a
          class="page-link"
          @click.prevent="changePage(pagination.page + 1)"
          :disabled="pagination.page >= pagination.pageCount"
          >»</a
        >
      </li>
    </ul>
  </div>
</template>


<script>
import VueSelect from 'vue-select';
const { DateTime } = require("luxon");

export default {
    data() {
        return {
            colonne: [
                { key: 'id', sortable: false },
                { key: 'DisplayName', sortable: true },
                { key: 'Citta', sortable: true },
                { key: 'Nazione', sortable: true },
                { key: 'Provincia', sortable: true },
                { key: 'modified', sortable: true },
                { key: 'azioni' },
            ],
            pagination: {
                'page': 1,
            },
            q: '',
            tags: [],
            tagList: [],
            sortBy: "modified",
            sortDesc: true,
            isBusy: false,
            nazione: null,
            provincia: null,
            accetta_newsletter:true,
            selected: [],
            persone: [],
            selectAllStatus: false,
            multiTags: '',
            showAddTag: false,
            ynempty: [
                { value: null, text: '---' },
                { value: true, text: 'Acconsente' },
                { value: false, text: 'Non Acconsente' },
            ]
        }
    },
    async created() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        //Devo leggere l'url corrente
        if (urlParams.has('q')) {
            this.q = urlParams.get('q');
        }

        if (urlParams.has('tags[]')) {
            this.tags = urlParams.getAll('tags[]');
        }

        if (urlParams.has('tags')) {
            this.tags = urlParams.getAll('tags');
        }

        if (urlParams.has('nazione')) {
            this.tags = urlParams.get('nazione');
        }

        if (urlParams.has('provincia')) {
            this.provincia = urlParams.get('provincia');
        }

        if (urlParams.has('accetta_newsletter')) {
            this.accetta_newsletter = urlParams.get('accetta_newsletter');
        }
    },
    methods: {
        isCurrentPage(page) {
            return this.pagination.page === page;
        },
        changePage(page) {
            if (page > this.pagination.pageCount) {
                page = this.pagination.pageCount;
            }
            this.pagination.page = page;
            //Dopo la pagination esterna devo ricaricare
            this.$root.$emit('bv::refresh::table', 'contacts');
        },
        fetchRows() {
            let url = '/api/persone.json?&page=' + this.pagination.page;
            if (this.q !== null) {
                url += '&q=' + this.q;
            }
            if (this.nazione !== null) {
                url += '&nazione=' + this.nazione;
            }
            if (this.accetta_newsletter !== null) {
                url += '&accetta_newsletter=' + this.accetta_newsletter;
            }
            if (this.provincia !== null) {
                url += '&provincia=' + this.provincia;
            }
            if (this.tags !== null) {
                url += '&tags[]=' + this.tags;
            }
            if (this.sortBy !== null) {
                url += '&sort=' + this.sortBy;
            }
            if (this.sortDesc !== null) {
                let s = 'asc';
                if (this.sortDesc) {
                    s = 'desc';
                }
                url += '&direction=' + s;
            }
            this.selectAllStatus = false;
            let promise = axios.get(url);
            return promise.then(response => {
                    this.persone = response.data.persone;
                    this.pagination = response.data.pagination.Persone;
                    return (this.persone);
                })
                .catch(error => {
                    console.log(error);
                    this.persone = [];
                    return [];
                });
        },
        fetchTags(search, loading) {
            if (search == undefined) {
                return [];
            }
            loading(true);

            let url = '/api/tags.json?&search=' + search;
            axios.get(url)
                .then(response => {
                    this.tagList = response.data.tags;
                    loading(false);
                    return;
                })
                .catch(error => {
                    console.log(error);
                    loading(false);
                    this.tagList = [];
                    return;
                });
        },
        async delPersone(id) {
            this.$bvModal.msgBoxConfirm("Vuoi davvero cancellare questa persona? " + id, {}).then(value => {
                if (value) {
                    $res = axios.delete('/api/persone/delete/' + id).then(() => {
                        this.$refs.tab.refresh();
                    });
                }
            });
        },
        deleteMulti() {
            this.$bvModal.msgBoxConfirm("Vuoi davvero cancellare le persone selezionate? ", {}).then(value => {
                if (value) {
                    let ids = this.getSelectedRowsIds();
                    $res = axios.delete('/api/persone/delete', {
                        data: { ids: ids },
                    }).then(() => {
                        this.$refs.tab.refresh();
                    });
                }
            });

        },
        niceDate: function(dt) {
            let d = DateTime.fromISO(dt);
            return d.toLocaleString();
        },
        search() {
            this.$router.replace({ path: "persone", query: { q: this.q, tags: this.tags, nazione: this.nazione, provincia: this.provincia, accetta_newsletter:this.accetta_newsletter } });
            //const urlParams = new URLSearchParams(window.location.search);
            //this.q = urlParams.get('q');
            //this.tags = urlParams.getAll("tags");
            this.$root.$emit('bv::refresh::table', 'contacts');
        },
        onRowSelected(items) {
            this.selected = items
        },
        selectAllRows() {
            if (this.selectAllStatus) {
                this.$refs.tab.selectAllRows();
            } else {
                this.$refs.tab.clearSelected();
            }
        },
        getSelectedRowsIds() {
            return this.selected.map(x => x.id);
        },
        addTag() {
            this.showAddTag = true;
            this.multiTags = prompt("Inserisci i tag da aggiungere");
            console.log(this.multiTags);
            if (this.multiTags) {
                let ids = this.getSelectedRowsIds();
                $res = axios.post('/api/persone/add-tags', {
                    ids: ids,
                    tags: this.multiTags
                }).then(() => {
                    this.$refs.tab.refresh();
                });
            }
            this.showAddTag = false;
        }
    },
    computed: {
        pages: function() {
            let pages = [];
            let from = this.pagination.page - Math.floor(this.pagination.perPage / 2);

            if (from < 1) {
                from = 1;
            }
            let to = from + this.pagination.perPage - 1;
            if (to > this.pagination.pageCount) {
                to = this.pagination.pageCount;
            }

            while (from <= to) {
                pages.push(from);
                from++;
            }

            return pages;
        },
        qString: function() {
            let url = '?';
            if (this.q !== null) {
                url += '&q=' + this.q;
            }
            if (this.nazione !== null) {
                url += '&nazione=' + this.nazione;
            }
            if (this.tags !== null) {
                url += '&tags[]=' + this.tags;
            }
            if (this.provincia !== null) {
                url += '&provincia=' + this.provincia;
            }
            if (this.accetta_newsletter !== null) {
                url += '&accetta_newsletter=' + this.accetta_newsletter;
            }
            return url;
        },
        tagArray: {
            get() {
                return this.tags;
            },
            set(newValue) {
                last = newValue[newValue.length - 1]
                if (typeof last == 'object') {
                    this.tags.push(last.id);
                } else {
                    this.tags = newValue;
                }
            }
        }


    }
}
</script>