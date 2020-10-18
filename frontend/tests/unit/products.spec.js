import { shallowMount } from '@vue/test-utils';
import Products from '@/components/Products.vue';

jest.mock('ky', () => ({
  get: () => ({ json: () => ({}) }),
}));

describe('Products.vue', () => {
  it('shows spinner when loading', () => {
    const wrapper = shallowMount(Products, {
      data() {
        return { loading: true };
      },
    });
    expect(wrapper.find('.test').exists()).toBe(true);
  });

  it('shows error when error exists', () => {
    const wrapper = shallowMount(Products, {
      data() {
        return { error: true };
      },
    });
    expect(wrapper.find('.test').exists()).toBe(true);
  });

  it('shows product list', () => {
    const wrapper = shallowMount(Products, {
      data() {
        return {
          products: [
            {
              id: 10826313492,
              title: 'Speedy',
              image:
                'https://cdn.shopify.com/s/files/1/2048/9723/products/alcedo-atthis-881594_1920.jpg?v=1496242694',
              total_sales: 50,
              total_quantity: 133,
              times_purchased: 5,
            },
          ],
        };
      },
    });
    expect(wrapper.find('.test').exists()).toBe(true);
  });
});
