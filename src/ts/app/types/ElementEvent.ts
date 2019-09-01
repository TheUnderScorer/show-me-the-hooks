export default interface ElementEvent<Element extends HTMLElement = HTMLElement> extends Event
{
    target: Element;
    currentTarget: Element;
}
