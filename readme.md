# Carbon SF2 Bundle
***
[Carbon datetime component](https://github.com/briannesbitt/Carbon)  
[Symfony2 convertors](http://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/converters.html)

This bundle provides an opportunity to convert Request data into Carbon objects.
````
/**
 * @Route("/blog/archive/{start}/{end}")
 * @ParamConverter("start", options={"format": "Y-m-d"})
 * @ParamConverter("end", options={"format": "Y-m-d"})
 */
public function archiveAction(\Carbon $start, \Carbon $end)
{
}
````