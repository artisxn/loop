FROM cypress/base:10

COPY ./frontend/package.json ./package.json
COPY ./frontend/package-lock.json package-lock.json

RUN npm i

CMD ["npm", "run", "test:e2e"]