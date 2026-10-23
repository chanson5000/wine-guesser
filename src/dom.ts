type Child = Node | string | number | null | undefined | false;
type AttrValue = string | number | boolean | null | undefined;
type Attrs = Record<string, AttrValue | EventListener>;

/**
 * Create an element. Strings become text nodes, so data is never parsed as HTML.
 * Attributes named `on<event>` with a function value are attached as listeners.
 */
export function el<K extends keyof HTMLElementTagNameMap>(
  tag: K,
  attrs: Attrs = {},
  ...children: (Child | Child[])[]
): HTMLElementTagNameMap[K] {
  const node = document.createElement(tag);
  for (const [name, value] of Object.entries(attrs)) {
    if (typeof value === 'function') {
      node.addEventListener(name.slice(2).toLowerCase(), value);
    } else if (value === true) {
      node.setAttribute(name, '');
    } else if (value !== false && value !== null && value !== undefined) {
      node.setAttribute(name, String(value));
    }
  }
  for (const child of children.flat()) {
    if (child === null || child === undefined || child === false) continue;
    node.append(child instanceof Node ? child : String(child));
  }
  return node;
}

export interface View {
  title: string;
  content: HTMLElement;
}
