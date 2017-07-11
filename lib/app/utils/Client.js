const WPAPI = require('wpapi');

const Client = new WPAPI({
  endpoint: window.fieldNotesAPI.endpoint,
  nonce: window.fieldNotesAPI.nonce || '',
});

Client.parks = Client.registerRoute('field-notes/v1', '/parks/(?P<id>)');

export default Client;
