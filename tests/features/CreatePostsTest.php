<?php 

class CreatePostsTest extends FeatureTestCase
{
	public function test_a_user_create_a_post()
	{
		//Having
		$title = 'Esta es una pregunta';
		$content = 'Este es el contenido';

		$this->actingAs($user = $this->defaultUser());
		
		//When
		$this->visit(route('posts.create'))
			->type($title, 'title')
			->type($content, 'content')
			->press('Publicar');

		//Then
		$this->seeInDatabase('posts', [
			'title' => $title,
			'content' => $content,
			'pending' => true,
			'user_id' => $user->id
		]);

		//Test a user is redirected to the posts details after creating it.
		$this->see($title);
	}

	public function test_a_guest_user_tries_to_create_a_post()
	{
		// //Having
		// $title = 'Esta es una pregunta';
		// $content = 'Este es el contenido';

		// // $this->actingAs($user = $this->defaultUser());
		
		// //When
		// $this->visit(route('posts.create'))
		// 	->type($title, 'title')
		// 	->type($content, 'content')
		// 	->press('Publicar');

		// //Then
		// $this->seeInDatabase('posts', [
		// 	'title' => $title,
		// 	'content' => $content,
		// 	'pending' => true,
		// 	'user_id' => $user->id
		// ]);

		// //Test a user is redirected to the posts details after creating it.
		// $this->see($title);
	}

	public function test_creating_a_post_requires_authentication()
	{
		//When
		$this->visit(route('posts.create'));

		//Then
		$this->seePageIs(route('login'));

		//Final Message
		// $this->see('User needs authentication');
	}

	public function test_create_form_validation()
	{
		//When
		$this->actingAs($user = $this->defaultUser());

		//Then
		$this->visit(route('posts.create'))
			 ->press('Publicar')
			 ->seePageIs(route('posts.create'))
			 ->seeErrors([
			 	'title' => 'El campo título es obligatorio',
			 	'content' => 'El campo contenido es obligatorio',
			 ]);
			 // cannot validate this shit. 
			 // ->seeInElement('#field_title .help-block', 'El campo titulo es obligatorio')
			 // ->seeInElement('#field_content .help-block', 'El campo contenido es obligatorio');
	}
}