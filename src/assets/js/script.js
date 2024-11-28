'use strict'


const
    doc = document,
    passive = {passive: true},
    force = { passive: false }


const
    all = (s, e) => { return e ? e.querySelectorAll(s) : doc.querySelectorAll(s) },

    one = (s, e) => { return e ? e.querySelector(s) : doc.querySelector(s) },

    rstr = (l = 24) => {
        const c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        let s = '';
        for (let i = 0; i < l; i++) { s += c[Math.floor(Math.random() * c.length)] }
        return s;
    },

    esc = e => {
        let r = false
    
        if ('key' in e) {
            r = (e.key === 'Escape' || e.key === 'Esc')
    
        } else if ('keyCode' in e) {
            r = e.keyCode === 27
        }
    
        return r
    },

    inVP = (el, d = 2) => {
        return el.getBoundingClientRect().top <= (Math.max(doc.documentElement.clientHeight || 0, window.innerHeight || 0) / d)
    },

    scrollAnchor = (el, t = 600, state, offset = 0, sect = false) => {
        if (sect) {
            el = sect
        } else {

            if (typeof el === 'string' && el.startsWith('#')) {
                el = el
            } else if (el) {
                el = el.getAttribute('href')
                el = el.substring(el.indexOf('#'))
            } else {
                return
            }
            if (!one(el)) {
                return
            }
        }

        let o

        cancelAnimationFrame(o)

        let r = performance.now(),
            n = window.pageYOffset || doc.documentElement.scrollTop,
            i = one(el).getBoundingClientRect().top - offset

        requestAnimationFrame(function e(c) {
            let l = (c - r) / t
            1 <= l && (l = 1), window.scrollTo(0, (n + i * l) | 0), 1 > l && (o = requestAnimationFrame(e))
        })
    },

    sbw = () => {
        const outer = doc.createElement('div')
        outer.style.visibility = 'hidden'
        outer.style.overflow = 'scroll'
        outer.style.msOverflowStyle = 'scrollbar'
        doc.body.appendChild(outer)
      
        const inner = doc.createElement('div')
        outer.appendChild(inner)
        
        const sbw = (outer.offsetWidth - inner.offsetWidth)
      
        outer.parentNode.removeChild(outer)

        doc.documentElement.style.cssText = `--sbw: ${sbw}px`;
        return sbw
    },

    showMessage = (message = '') => {
        const id = rstr()
        doc.body.insertAdjacentHTML(
            'beforeend',
            `<dialog class="dialog message-dialog" id="${id}">
                <div class="dialog__body message-dialog__body">
                    <div class="dialog__close message-dialog__close"></div>
                    <div class="message-dialog__content">${message}</div>
                </div>
            </dialog>`
        )
        one(`#${id}`)?.showModal()
        sbw()
        doc.body.classList.add('body--locked')
    }


/**
 * Modificator
 * manager
 */

class ModificatorManager {
    constructor(block, mod) {
        this.className.block = block
        this.className.mod = mod
    }

    className = {
        block: '',
        mod: ''
    }

    setMark = (el, block, mod) => {
        const time = Date.now().toString()
        el?.setAttribute(`data-mark${block}${mod}`, `${time}${block}${mod}`)
        return time
    }

    getMark = (el, block, mod) => {
        return el?.getAttribute(`data-mark${block}${mod}`)
    }

    getAllBlocks = () => {
        return all(`.${this.className.block}`)
    }

    getClosestBlock = (e) => {
        return e?.target?.closest(`.${this.className.block}`)
    }

    addMod = (e, elem) => {
        const el = e ? this.getClosestBlock(e) : elem
        el?.classList?.add(this.className.mod)
    }

    removeMod = (e, elem) => {
        const el = e ? this.getClosestBlock(e) : elem
        el?.classList?.remove(this.className.mod)
    }

    toggleByScrollTop = (el, distance = 100) => {
        doc.documentElement.scrollTop > distance ? this.addMod(null, el) : this.removeMod(null, el)
    }

    manageMod = (e) => {
        const el = this.getClosestBlock(e)
        const mark = this.setMark(el, this.className.block, this.className.mod)
        const allEls = this.getAllBlocks()

        allEls?.forEach(el => {
            if (this.getMark(el, this.className.block, this.className.mod) !== mark) {
                this.removeMod(null, el)
            }
        })

        this.addMod(null, el)
    }
}


/**
 * Manage _active
 */

const ActiveManager = new ModificatorManager('--manage-active', '_active')
window.addEventListener('click', ActiveManager.manageMod, passive)


/**
 * Manage _scrolled
 */

const ScrolledManager = new ModificatorManager('--manage-scrolled', '_scrolled')
const header = one('.header');
const app = one('.app');
ScrolledManager.toggleByScrollTop(header, 10)
ScrolledManager.toggleByScrollTop(app, 10)

window.addEventListener('scroll', () => {
    ScrolledManager.toggleByScrollTop(header, 10)
    ScrolledManager.toggleByScrollTop(app, 10)
}, passive)


/**
 * Coordinats in Viewport
 * 
 * @param {*} data 
 * @returns 
 */

window.coordsInViewport = (data = {}) => {
    const { innerHeight, innerWidth } = window;
    return ((data.top > 0 && data.top < innerHeight) || (data.bottom > 0 && data.bottom < innerHeight)) && ((data.left > 0 && data.left < innerWidth) || (data.right > 0 && data.right < innerWidth))
}

/**
 * Cursor shadow
 */

const cursorShadowMousemove = new Event('cursorShadowMousemove');
const cursorShadow = doc.createElement('div');
cursorShadow.classList.add('cursor-shadow');
one('#app').appendChild(cursorShadow);

window.addEventListener('mousemove', function (e) { 
    cursorShadow.style.left = `${e.clientX}px`; 
    cursorShadow.style.top = `${e.clientY}px`; 
}, passive); 


/**
 * Observe Event
 */
const observeEvent = new Event('observeEvent');

const observeEventCallback = (mutationList, observer) => {
    mutationList.forEach(mutation => {
        if (mutation.type === "attributes" && mutation.attributeName === 'style') {
            window.dispatchEvent(observeEvent)
        }
    })
}
const observeEventObserver = new MutationObserver(observeEventCallback)
const observeEventConfig = { attributes: true, childList: false, subtree: false };

all('.--observe-event')?.forEach(el => {
    observeEventObserver.observe(el, observeEventConfig);
})


/**
 * Get Random value
 * @param {*} min 
 * @param {*} max 
 * @returns 
 */

window.random = (min, max) => {
    return max ? min + Math.random() * (max + 1 - min) : Math.random();
}

/**
 * Stars BG
 */
{
    const app = one('#app')
    const canvasSize = window.innerWidth * window.innerHeight;
    const starsFraction = canvasSize / 10000;
    
    for (let i = 0; i < starsFraction; i++) {
        let xPos = random(0, 100);
        let yPos = random(0, 100);
        let alpha = random(0.1, 1);
        const sizeList = [1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 3, 4]
        let size = sizeList[Math.floor(Math.random() * sizeList.length)];
        let zIndex = 1;
    
        const star = doc.createElement('div');
        star.classList.add('star');
        star.style.left = xPos + '%';
        star.style.top = yPos + '%';
        star.style.width = size + 'px';
        star.style.height = size + 'px';
        star.style.zIndex = zIndex;
    
        const starLight = doc.createElement('div');
        starLight.classList.add('star__light');
        starLight.classList.add('--blink');
        starLight.style.opacity = alpha;
    
        starLight.setAttribute('data-blink', 'background-color');
    
        star.appendChild(starLight);
    
        app.appendChild(star);
    }
}


/**
 * Blink
 */

function blink(els, duration = 2000) {
    const list = [
        '#ebd300', '#ebd300', '#ebd300', '#ebd300', '#ebd300', '#ebd300', '#ebd300', '#ebd300', '#ebd300', '#ebd300', //yellow
        'transparent', 'transparent', 'transparent', 'transparent', // transparent
        '#ffffff', '#ffffff', // white
        '#ed7a21', // red
        '#26309e', // blue
    ]

    els?.forEach((self) => {
        setInterval(() => {
            self.setAttribute('style', `${self.getAttribute('data-blink')}:${list[Math.floor(Math.random() * list.length)]}`)
        }, duration)
    })
}

blink(all('.--blink'))

/**
 * All slider-1
 */
{
    const sliderFinished = new Event('sliderFinished');
    const allSliders = all('.slider-1');
    const speed = 800;

    allSliders?.forEach(slider => {
        const swiper = new Swiper(slider, {
            autoHeight: true,
            slidesPerView: 1,
            spaceBetween: 20,
            speed: speed,
            centeredSlides: true,
            keyboard: {
                enabled: true,
                onlyInViewport: true
            },
            breakpoints: {
                1001: {
                    slidesPerView: 2,
                }
            },
            on: {
                transitionStart: () => {
                    let time = speed * 2;
                    const step = 30;

                    const interval = setInterval(() => {
                        if (time > speed) {
                            window.dispatchEvent(observeEvent);
                        } else {
                            clearInterval(interval);
                        }
                        time -= speed / step
                    }, speed / step)
                },
                transitionEnd: () => {
                    window.dispatchEvent(sliderFinished);
                }
            }
        });
    });
}

all('a')?.forEach(a => {
    let href = a.getAttribute('href')

    if (window.location.pathname == '/' && href.length > 1 && href[0] == '/' && href[1] == '#') {
        href = href.replace('/', '')
    }

    if (href.startsWith('#') && !href.startsWith('#Dialog') && !href.startsWith('#Menu')) {
        a.addEventListener('click', e => {
            e.preventDefault()
            scrollAnchor(href)
        }, force)
    }
})

/**
 * Data time attr
 * manage
 */
const setDataTime = (el) => {
    const time = Date.now().toString()
    el?.setAttribute('data-time', time)
    return time
}

const getDataTime = (el) => {
    return el?.getAttribute('data-time')
}


/**
* modal
*/
{
    const modalAnimationFinishedEvent = new Event('modalAnimationFinished');

    /**
     * Hide modal
     * @param {'element'} modal 
     * @param {'document body element'} body 
     * @param {'element'} heap 
     * @param {'element'} overlay 
     */
    window.writingorHideModal = (
        modal = false,
        body = one('body'),
        heap = one('#--writingor-modals-heap'),
        overlay = one('#--writingor-body-overlay')
    ) => {
        if (body && heap && overlay && modal) {

            modal.classList.add('--writingor-modal_collapsed')

            setTimeout(() => {
                modal.classList.remove('--writingor-modal_active')
                overlay.classList.remove('--writingor-body-overlay_active')
                body.classList.remove('--writingor-body_locked')
                writingorPutModalToHeap(modal);
            }, 250);

        } else {
            console.warn('Check elements:', modal, body, heap, overlay)
        }
    }

    /**
     * Put modal to heap
     * @param {'element'} modal 
     * @param {'document body element'} body 
     * @param {'element'} heap 
     * @param {'element'} overlay 
     */
    window.writingorPutModalToHeap = (
        modal = false,
        rmClassNames = [],
        heap = one('#--writingor-modals-heap')
    ) => {

        if (heap && modal) {

            if (rmClassNames.length < 1) {
                rmClassNames = modal.getAttribute('data-rm-classnames');
                rmClassNames = rmClassNames?.split(' ');
            }

            rmClassNames?.forEach(className => {
                modal.classList.remove(className);
            });

            heap.append(modal);
        }
    }

    /**
     * Put modal to overlay
     * @param {'element'} modal 
     * @param {'document body element'} body 
     * @param {'element'} heap 
     * @param {'element'} overlay 
     */
    window.writingorPutModalToOverlay = (
        modal = false,
        addClassNames = [],
        overlay = one('#--writingor-body-overlay')
    ) => {

        if (overlay && modal) {

            addClassNames?.forEach(className => {
                modal.classList.add(className);
            });

            overlay.append(modal);
            writingorModalOnShowAction(modal);
        }
    }

    /**
     * modal
     * action
     * on show
     */
    window.writingorModalOnShowAction = (modal) => {
        modal.classList.remove('--writingor-modal_collapsed')
        modal.classList.add('--writingor-modal_active')

        let allHideButtons = modal.querySelectorAll('.--writingor-modal__hide')

        if (allHideButtons.length < 1) {
            const hideButton = doc.createElement('button')
            hideButton.setAttribute('class', '--writingor-modal__hide')
            hideButton.setAttribute('title', 'Hide modal')
            modal.append(hideButton)

            if (hideButton && !hideButton.classList.contains('--writingor-modal__hide_ready')) {
                hideButton.classList.add('--writingor-modal__hide_ready')
                hideButton.addEventListener('click', () => {
                    writingorHideModal(modal)
                })
            }
        }

        allHideButtons = modal.querySelectorAll('.--writingor-modal__hide')

        allHideButtons?.forEach(hideButton => {
            if (hideButton && !hideButton.classList.contains('--writingor-modal__hide_ready')) {
                hideButton.classList.add('--writingor-modal__hide_ready')
                hideButton.addEventListener('click', () => {
                    writingorHideModal(modal)
                })
            }
        });

        setTimeout(() => {
            window.dispatchEvent(modalAnimationFinishedEvent)
        }, 1000)
    };

    /**
     * Show modal
     * @param {'element'} button
     * @param {'document body element'} body 
     * @param {'element'} heap 
     * @param {'element'} overlay 
     */
    window.writingorShowModal = (
        button = false,
        body = one('body'),
        heap = one('#--writingor-modals-heap'),
        overlay = one('#--writingor-body-overlay')
    ) => {

        if (button && body && heap && overlay) {

            let allExistingModals = overlay.querySelectorAll('.--writingor-modal')

            if (allExistingModals) {
                allExistingModals.forEach(existingModal => {
                    writingorHideModal(existingModal)
                })
            }

            let target = button.getAttribute('data-modal') ? button.getAttribute('data-modal') : button.getAttribute('href')

            if (target && target.startsWith('#')) {
                let modal = one(target)

                if (modal) {
                    overlay.classList.add('--writingor-body-overlay_active')
                    sbw()
                    body.classList.add('--writingor-body_locked')
                    writingorPutModalToOverlay(modal);

                    const autoHideTime = parseInt(modal.getAttribute('data-modal-autohide-time'));

                    if (autoHideTime) {
                        const time = setDataTime(modal);

                        setTimeout(() => {
                            if (time === getDataTime(modal) && modal.classList.contains('--writingor-modal_active')) {
                                writingorHideModal(modal);
                            }
                        }, autoHideTime);
                    }
                }
            }
        }
    }

    /**
     * Сall
     * writingorShowModal()
     * and
     * writingorHideModal()
     * on page load
     */
    doc.addEventListener('DOMContentLoaded', () => {

        const overlay = doc.createElement('div')
        overlay.setAttribute('id', '--writingor-body-overlay')
        overlay.setAttribute('class', '--writingor-body-overlay')
        one('body').append(overlay)

        const heap = doc.createElement('div')
        heap.setAttribute('id', '--writingor-modals-heap')
        heap.setAttribute('class', '--writingor-modals-heap')
        one('body').append(heap)

        all('--writingor-modal')?.forEach(modal => {
            writingorPutModalToHeap(modal);
        })

        all('[data-modal]').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault()
                writingorShowModal(button)
            }, force)
        })

        if (overlay) {
            overlay.onclick = (e) => {
                if (!e.target.closest('.--writingor-modal')) {
                    all('.--writingor-modal')?.forEach(modal => {
                        writingorHideModal(modal)
                    })
                }
            }
        }

        doc.addEventListener('keydown', (e) => {
            if (esc(e)) {
                all('.--writingor-modal', overlay)?.forEach(modal => {
                    writingorHideModal(modal)
                })
            }
        }, passive)

        all('.--hide-all-modals')?.forEach(button => {
            button.addEventListener('click', () => {
                all('.--writingor-modal')?.forEach(modal => {
                    writingorHideModal(modal)
                })
            }, passive)
        })
    }, passive)
}


/**
 * forms
 */
{
    const allForms = all('form');

    allForms?.forEach(form => {
        form.onsubmit = (e) => {
            e.preventDefault();

            /**
             * Prevent oversubmiting
             */
            if (form.classList.contains('--processing')) {
                alert('PLease, wait.');
                return;
            }
            form.classList.add('--processing');

            /**
             * Prepare data
             */
            const data = new FormData(form);
            data.append('action', 'writingor_contact_form')
            data.append('nonce', writingorAjax.nonce);

            /**
             * Clear old validation
             */
            const allInputWrappers = form.querySelectorAll('.--validation');

            allInputWrappers?.forEach(iw => {
                iw.classList.remove('_error');
                iw.classList.remove('_success');

                let inputTooltip = iw?.querySelector('.--tooltip');

                if (inputTooltip) {
                    inputTooltip.textContent = '';
                }
            })

            /**
             * Send data
             */
            fetch('/wp-admin/admin-ajax.php', {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: new URLSearchParams(data)

            }).then((response) => {
                return response.json();

            }).then((res) => {
                form.classList.remove('--processing');

                if (res.error.count > 0) {
                    const input = form.querySelector(`[name=${res.error.field}]`);

                    const inputWrapper = input?.closest('.--validation');
                    inputWrapper?.classList.add('_error');

                    const inputTooltip = inputWrapper?.querySelector('.--tooltip');

                    if (inputTooltip) {
                        inputTooltip.textContent = res.error.text;
                    }

                } else {
                    const modalOpener = form.querySelector('[data-success-modal]');
                    const modalId = modalOpener?.getAttribute('data-success-modal');

                    if (modalId) {
                        writingorPutModalToHeap(form.closest('.--writingor-modal'));
                        writingorPutModalToOverlay(one(modalId))
                    }

                    allInputWrappers?.forEach(iw => {
                        iw.classList.remove('_error');
                        iw.classList.remove('_success');

                        const inputTooltip = iw?.querySelector('.--tooltip');

                        if (inputTooltip) {
                            inputTooltip.textContent = '';
                        }

                        const input = iw.querySelector('input');

                        if (input) {
                            input.value = '';
                        }
                    });
                }

            }).catch((error) => {
                form.classList.remove('--processing');
            });
        }
    });
}


/**
 * Cursor Follower
 */

class CursorFollower {

    constructor(element) {
        this.element = element
        this.mouseHasEntered = true
        this.mouseIsInButtonTerritory = false
        this.updateRect()
    }

    updateRect = () => {
        this.rect = this.element.getBoundingClientRect()
        this.height = this.rect.height
        this.width = this.rect.width
        this.distance = this.width / 2
        this.x = this.rect.x
        this.y = this.rect.y
        this.leftBorderLine = this.x - this.distance
        this.rightBorderLine = this.x + this.distance + this.width
        this.topBorderLine = this.y - this.distance
        this.bottomBorderline = this.y + this.distance + this.height
        this.top = this.rect.top
        this.bottom = this.rect.bottom
        this.left = this.rect.left
        this.right = this.rect.right
        this.data = {
            top: this.top,
            bottom: this.bottom,
            left: this.left,
            right: this.right
        }
    }

    clear = () => {
        this.element.style.transform = `translate(0px, 0px) rotateX(0deg) rotateY(0deg)`
        this.mouseHasEntered = true
    }

    follow = (e) => {
        if (coordsInViewport(this.data)) {
            const x = e.x
            const y = e.y
    
            const buttonX = this.x + this.width / 2
            const buttonY = this.y + this.height / 2
    
            const xWalk = Math.round((x - buttonX) / 6)
            const yWalk = Math.round((y - buttonY) / 6)
    
            this.mouseIsInButtonTerritory = x > this.leftBorderLine && x < this.rightBorderLine && y > this.topBorderLine && y < this.bottomBorderline
    
            if (this.mouseIsInButtonTerritory) {
                if (this.mouseHasEntered) {
                    this.mouseHasEntered = false
                }
                this.element.style.transform = `translate(${xWalk}px, ${yWalk}px)`
    
            } else {
                this.clear()
            }
        }
    }

    perspective = (e) => {
        if (coordsInViewport(this.data)) {
            const x = e.x
            const y = e.y
    
            let constrain = 5;
    
            let xWalk = (x - this.x - (this.width / 2)) / constrain;
            let yWalk = - (y - this.y - (this.height / 2)) / constrain;
            
            this.mouseIsInButtonTerritory = x > this.leftBorderLine && x < this.rightBorderLine && y > this.topBorderLine && y < this.bottomBorderline
    
            if (this.mouseIsInButtonTerritory) {
                if (this.mouseHasEntered) {
                    this.mouseHasEntered = false
                }
                this.element.style.transform = `perspective(600px) rotateX(${xWalk}deg) rotateY(${yWalk}deg)`
    
            } else {
                this.clear()
            }
        }
    }

    light = (e) => {
        if (coordsInViewport(this.data)) {
            const x = e.x
            const y = e.y
    
            const buttonX = this.x + this.width / 100
            const buttonY = this.y + this.height / 100
    
            const xWalk = Math.floor(x - buttonX)
            const yWalk = Math.floor(y - buttonY)
    
            this.element.style.backgroundImage = "radial-gradient(circle at " + xWalk + "px " + yWalk + "px, #1323d6 1px, transparent 600px)";
        }
    }
}

/**
 * Cursor follow
 */
const followCollection = []
all('.--cursor-follow')?.forEach(button => {
    followCollection.push(new CursorFollower(button))
})

/**
 * Cursor perspective
 */
const perspectiveCollection = []
all('.--cursor-perspective')?.forEach(button => {
    perspectiveCollection.push(new CursorFollower(button))
})

/**
 * Cursor light
 */
const lightCollection = []
all('.--cursor-light')?.forEach(button => {
    lightCollection.push(new CursorFollower(button))
})

/**
 * Update events
 */
const updateEventsCursorfollowCollection = ['scroll', 'resize', 'modalAnimationFinished', 'sliderFinished', 'observeEvent']
updateEventsCursorfollowCollection.forEach(eventName => {

    window.addEventListener(eventName, () => {
        /**
         * Cursor follow
         */
        followCollection.forEach(Follower => {
            Follower.updateRect()
        })

        /**
         * Cursor perspective
         */
        perspectiveCollection.forEach(Follower => {
            Follower.updateRect()
        })

        /**
         * Cursor light
         */
        lightCollection.forEach(Follower => {
            Follower.updateRect()

            cursorShadowMousemove.x = parseInt(cursorShadow.style.left)
            cursorShadowMousemove.y = parseInt(cursorShadow.style.top)
            cursorShadowMousemove.specialTarget = Follower.element

            window.dispatchEvent(cursorShadowMousemove, {
                cancelable: true,
                composed: false
            });
        })
    }, passive)
})

/**
 * Follow events
 */
const followEventsCursorfollowCollection = ['sliderFinished', 'observeEvent', 'cursorShadowMousemove', 'mousemove']
followEventsCursorfollowCollection.forEach(eventName => {
    window.addEventListener(eventName, (e) => {
        /**
         * Cursor follow
         */
        followCollection.forEach(Follower => {
            Follower.follow(e)
        })

        /**
         * Cursor perspective
         */
        perspectiveCollection.forEach(Follower => {
            Follower.perspective(e)
        })

        /**
         * Cursor light
         */
        lightCollection.forEach(Follower => {
            Follower.light(e)
        })
    }, passive)
})
