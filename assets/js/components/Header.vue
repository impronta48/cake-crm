<template>
  <div class="container">
    <b-navbar toggleable="lg" variant="light">
      <div class="container">
        <b-navbar-brand to="/">
            <img :src="config.logo" height="80px">
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item to="/persone">
              <b-icon-person-badge></b-icon-person-badge> Persone
            </b-nav-item>
            <b-nav-item to="/campaigns">
              <b-icon-envelope></b-icon-envelope> Campagne
            </b-nav-item>
            <b-nav-item to="/opportunities" disabled>
              <b-icon-bullseye></b-icon-bullseye>
              Opportunità
            </b-nav-item>
            <b-nav-item
              :href="config.trello"
              target="trello"
            >
              <b-icon-kanban></b-icon-kanban>
              Trello
            </b-nav-item>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">
            <b-nav-item
              :href="config.urlPrenota"
              target="preview"
            >
              Prenota B²RM
              <b-icon-globe></b-icon-globe>
            </b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </div>
    </b-navbar>
  </div>
</template>

<script>
import config from '../config';

export default {
    data() {
        return {
            config: config,
        };
    }
}
</script>