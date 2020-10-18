// https://docs.cypress.io/api/introduction/api.html

const auth = {
  username: 'kasey.culmback@gmail.com',
  password: 'Password123!',
};

describe('General', () => {
  it('Visits the app root url', () => {
    cy.visit('/', { auth });
    cy.contains('h1', 'Universe of Birds');
  });

  it('Shows list of products', () => {
    cy.visit('/', { auth });

    cy.wait(2000);

    cy.get('.products__list').should('be.visible');
  });
});
