// Navigation toggle
window.addEventListener('load', function () {
      let main_navigation = document.querySelector('#primary-menu');
      if (document.querySelector('#primary-menu-toggle')) {
            document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
                  e.preventDefault();
                  main_navigation.classList.toggle('hidden');
            });
      }

      // Keyboard navigation for collection pages
      if (window.collectionSectionIds && window.collectionSectionIds.length > 0) {
            document.addEventListener('keydown', function (e) {
                  if (e.key === 'ArrowRight' || e.key === 'ArrowLeft' || e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                        const sectionIds = window.collectionSectionIds;
                        let currentSectionIndex = -1;

                        // Find the section that is currently most visible in the viewport
                        let minDistance = Infinity;
                        sectionIds.forEach((id, index) => {
                              const element = document.getElementById(id);
                              if (element) {
                                    const rect = element.getBoundingClientRect();
                                    
                                    // Calculate how much of the element is visible in the viewport
                                    const visibleHeight = Math.min(rect.bottom, window.innerHeight) - Math.max(rect.top, 0);
                                    const visibleWeight = visibleHeight > 0 ? visibleHeight : 0;
                                    
                                    // Distance from the top of the viewport
                                    const distance = Math.abs(rect.top);
                                    
                                    // If this element is significantly visible, or it's the closest to the top
                                    if (visibleWeight > window.innerHeight * 0.5) {
                                          // If more than 50% of viewport is covered by this section, it's definitely the current one
                                          minDistance = distance;
                                          currentSectionIndex = index;
                                    } else if (distance < minDistance) {
                                          minDistance = distance;
                                          currentSectionIndex = index;
                                    }
                              }
                        });

                        if (currentSectionIndex !== -1) {
                              // If we're already at the last section and trying to go down, 
                              // or at the first section and trying to go up, 
                              // check if we're actually at the very bottom/top of the page.
                              const isAtBottom = (window.innerHeight + window.pageYOffset) >= document.body.offsetHeight - 2;
                              const isAtTop = window.pageYOffset <= 2;

                              let targetIndex = -1;
                              if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                                    if (currentSectionIndex === sectionIds.length - 1 && isAtBottom) {
                                          targetIndex = 0;
                                    } else {
                                          targetIndex = currentSectionIndex + 1;
                                    }
                              } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                                    if (currentSectionIndex === 0 && isAtTop) {
                                          targetIndex = sectionIds.length - 1;
                                    } else {
                                          targetIndex = currentSectionIndex - 1;
                                    }
                              }

                              if (targetIndex >= sectionIds.length) {
                                    targetIndex = 0;
                              } else if (targetIndex < 0) {
                                    targetIndex = sectionIds.length - 1;
                              }

                              if (targetIndex >= 0 && targetIndex < sectionIds.length) {
                                    const targetElement = document.getElementById(sectionIds[targetIndex]);
                                    if (targetElement) {
                                          e.preventDefault();
                                          targetElement.scrollIntoView({ behavior: 'smooth' });
                                          // Update hash without jumping
                                          history.pushState(null, null, '#' + sectionIds[targetIndex]);
                                    }
                              }
                        }
                  }
            });
      }
});
