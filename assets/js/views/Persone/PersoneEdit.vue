<template>
  <form action="">
    <fieldset class="border p-3">
      <legend class="w-auto p-2">Dati Personali</legend>
      <b-row>
        <b-col sm="3">
          <label>Nome</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Nome" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Cognome</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Cognome" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>DisplayName</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.DisplayName" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Tag List</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.tag_list" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Categorie</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Categorie" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Società</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Societa" />
        </b-col>
      </b-row>
    </fieldset>
    <fieldset class="border p-3">
      <legend class="w-auto p-2">Contatti</legend>
      <b-row>
        <b-col sm="3">
          <label>E-mail</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.EMail" />
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="3">
          <label>Cellulare</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Cellulare" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Telfono Domicilio</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.TelefonoDomicilio" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Telefono Ufficio</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.TelefonoUfficio" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Titolo</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Titolo" />
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="3">
          <label>Carica</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Carica" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Data di Nascita</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.DataDiNascita" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Ultimo Contatto</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.UltimoContatto" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Sito Web</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.SitoWeb" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Modificato Da</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.ModificatoDa" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Fax</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Fax" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Account XMPP</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.IM" />
        </b-col>
      </b-row>

      <b-row class="mt-2">
        <b-col sm="3">
          <label>Note</label>
        </b-col>
        <b-col>
          <b-textarea type="text" v-model="persona.Nota" />
        </b-col>
      </b-row>
    </fieldset>

    <fieldset class="border p-3">
      <legend class="w-auto p-2">Indirizzo</legend>
      <b-row>
        <b-col sm="3">
          <label>Indirizzo</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Indirizzo" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Citta</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Citta" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Provincia</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Provincia" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Nazione</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.Nazione" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>CAP</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.CAP" />
        </b-col>
      </b-row>
    </fieldset>

    <fieldset class="border p-3">
      <legend class="w-auto p-2">Contabilità</legend>

      <b-row>
        <b-col sm="3">
          <label>Partita IVA</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.piva" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Codice Fiscale</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.cf" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>IBAN</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.iban" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Nome Banca</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.NomeBanca" />
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="3">
          <label>Nome Banca</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.codiceIPA" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>Nome Banca</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.indirizzoPEC" />
        </b-col>
      </b-row>
    </fieldset>

    <fieldset class="border p-3">
      <legend class="w-auto p-2">Altro Contatto</legend>

      <b-row>
        <b-col sm="3">
          <label>Indirizzo - 2</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.altroIndirizzo" />
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="3">
          <label>Citta - 2</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.altraCitta" />
        </b-col>
      </b-row>

      <b-row>
        <b-col sm="3">
          <label>CAP - 2</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.altroCap" />
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="3">
          <label>Provincia - 2</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.altraProv" />
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="3">
          <label>Nazione - 2</label>
        </b-col>
        <b-col>
          <b-input type="text" v-model="persona.altraNazione" />
        </b-col>
      </b-row>
    </fieldset>
    <fieldset class="border p-3">
      <legend class="w-auto p-2">Marketing</legend>

      <b-check v-model="persona.accetta_newsletter">Accetta Newsletter</b-check>
    </fieldset>
    <b-button class="mt-3">Salva</b-button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      persona: {
        Nome: null,
        Cognome: null,
        DisplayName: null,
        tag_list: null,
        Societa: null,
        EMail: null,
        Cellulare: null,
        Indirizzo: null,
        Provincia: null,
        Nazione: null,
        CAP: null,
        TelefonoDomicilio: null,
        TelefonoUfficio: null,
        DataDiNascita: null,
        UltimoContatto: null,
        Nota: null,
        Titolo: null,
        Carica: null,
        SitoWeb: null,
        ModificatoDa: null,
        Fax: null,
        IM: null,
        Cateorie: null,
        piva: null,
        cf: null,
        iban: null,
        NomeBanca: null,
        altroIndirizzo: null,
        altraCitta: null,
        altroCap: null,
        altraProv: null,
        altraNazione: null,
        CodiceIPA: null,
        indirizzoPEC: null,
        accetta_newsletter: null,
      },
    };
  },
  mounted() {
    let id = this.$route.params.id;
    let url = `/api/persone/edit/${id}.json`;
    let promise = axios.get(url);
            return promise.then(response => {
                    this.persona = response.data.persone;
                    console.log(response.data)
                    return (this.persona);
                })
                .catch(error => {
                    console.log(error);
                    this.persone = [];
                    return [];
                });
  }
};
</script>