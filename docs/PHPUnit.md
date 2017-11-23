# PHPUnit call stack

- TestSuite::run
    - $test->run line 722
- TestCase::runBare()
- ExampleTest::runBare()
    + TestCase::runBare
- ExampleTest::setUp()
    + Laravel TestCase::setUp()
    + Set up app variables
    - ExampleTest, Facades::clearResolvedFacades() <- **Here**
- ExampleTest::runTest
- ExampleTest::tearDown
    + unset all app variables
    + Illuminate\Foundation\Testing\TestCase
    - $this->app->flush()
    - Mockery::close() ???
    - Artisan::forgetBootstrappers()

From the stack we know, the unit test does the following things:

- Initialize the variables for the test
- Run the test
- Unset the variables
- Repeat