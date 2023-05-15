<template>
  <div class="flex justify-center items-center">
    <div class="w-full">
      <table width="100%">
        <tr>
          <td>
            <Heading :level="1">{{this.card.welcomeMessage}}<b>{{this.card.userName}}</b>!</Heading>
            <br>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24" class="inline-block" role="presentation"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg> <b>{{this.card.serverVersionCaption}}</b> {{this.card.serverVersion}}
            <br>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24" class="inline-block" role="presentation"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> <b>{{this.card.administratorCaption}}</b> {{this.card.administrator}}
            <br>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24" class="inline-block" role="presentation"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> <a href="{{this.card.onlineHelpURL}}" target="_blank">{{this.card.onlineHelpCaption}}</a>
            <br>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24" class="inline-block" role="presentation"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg> <a href="{{this.card.privacyURL}}" target="_blank">{{this.card.privacyCaption}}</a> | <a href="{{this.card.imprintURL}}" target="_blank">{{this.card.imprintCaption}}</a>
          </td>
          <td style="text-align:right">
            <img :src="this.card.customerLogo" width="200" style="float: right;"/>
          </td>
        </tr>
      </table> 
    </div>
  </div>
</template>

<script>
  export default {
    props: [
      'card',
      ],
    mounted() {
    },
  }
</script>